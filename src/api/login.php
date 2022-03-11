<?php
// Required headers
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
session_start();
var_dump($_SESSION);
require_once('../../config/database.php');
include_once('../utils/generate-token.php');
include_once('../utils/sanitize-input.php');
require_once("audit.php");
//include_once('../utils/get-message.php');

function get_role($Id){
    $database = new Database();
    $db = $database->get_connection();
    $user_role = $db->query("SELECT Description FROM userroles WHERE Id = (SELECT UserRoleId FROM roles WHERE UserId = {$Id})")->fetch(PDO::FETCH_ASSOC);
    return $user_role;
}

function verify_user($table_prefix, $email, $password){
    $database = new Database();
    $db = $database->get_connection();

    $table_name = $table_prefix."_users";

    //lugaw = projects (fund), ligaw = voter (voter)
    if($table_prefix === 'fund'){
        $sql_query = "SELECT Id, EmailAddress, Password, Salt FROM {$table_name} WHERE EmailAddress = ? AND isVerified = 1";
    } else {
        $sql_query = "SELECT Id, EmailAddress, Password, Salt FROM {$table_name} WHERE EmailAddress = ?";
    }

    $stmt = $db->prepare($sql_query);
    $stmt->bindParam(1, $email);

    $stmt->execute();
    
    $user_details = $stmt->fetch(PDO::FETCH_ASSOC);

    $salted_password = $user_details['Salt'] . $password;

    $is_password_same = password_verify($salted_password, $user_details['Password']);

    if($is_password_same){
        $_SESSION['isAuthenticated'] = 1;
        $_SESSION['role'] = get_role($user_details['Id']);
        $_SESSION['id'] = $user_details['Id'];

        // Audit login
        $uid = $_SESSION['id'];
        $urole = $_SESSION['role']['Description'];
        $audit_details = array( $uid, "LOGIN", "user id: {$uid} role: {$urole} succesfully logged in", date('Y-m-d H:m:s') );

        insert_audit($db, $_SESSION['page'], $audit_details);
        return 1;
    }
}

// function to redirect user base on status
function redirect_page($page_prefix, $status = 1){
    // page_prefix is either lugaw / ligaw
    // status is 1 = login success, 0 for failure

    $header_location = '';

    if($status === 1){

        $header_location = 'Location: ../../public/'.$page_prefix.'-dashboard.php';

    } elseif($status === 0) {

        $header_location = 'Location: ../../public/'.$page_prefix.'-login.php?auth=0';
    }

	header($header_location);
    exit;
}



// Check request if POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!empty($_POST['token'])) {

        if (hash_equals($_SESSION['token'], $_POST['token'])) {
            // Proceed to process the form data
            // Post request coming from LOGIN-LUGAW.php
            if(isset($_POST['btn-login-lugaw'])){

                $table_prefix = "fund";
                $email = sanitize_input($_POST['email']);
                $password = sanitize_input($_POST['password']);

                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                
                if($email === false){
                    redirect_page('lugaw', 0);
                }

                if(verify_user($table_prefix, $email, $password) === 1){
                    redirect_page('lugaw');
                } else {
                    redirect_page('lugaw', 0);
                }
            }
            // Post request coming from LOGIN-LIGAW.php
            if(isset($_POST['btn-login-ligaw'])){

                $table_prefix = "voter";
                $email = sanitize_input($_POST['email']);
                $password = sanitize_input($_POST['password']);

                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                
                if($email === false){
                    redirect_page('ligaw', 0, 2);
                }

                if(verify_user($table_prefix, $email, $password)){
                    redirect_page('ligaw', 1, 1);
                }  else {
                    redirect_page('ligaw', 0, 2);
                }
            }

        } else {
             // Log this as a warning and keep an eye on these attempts
            unset($_SESSION["token"]);

            die();
        }
    }

    

}

?>