<?php
// Required headers
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once ('../../config/database.php');

$password = 'juandela';

$hashed_password_DEFAULT = password_hash($password, PASSWORD_DEFAULT);

print($hashed_password_DEFAULT."-> using PASSWORD DEFAULT");

$is_password_same = password_verify($password, $hashed_password_DEFAULT);
var_dump($is_password_same);

function sanitize_input($user_input){
    $data = trim($user_input);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST['btn-lugaw-register'])){

    }
}

?>