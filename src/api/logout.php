<?php
session_start();

// Required headers
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once("audit.php");
require_once("../../config/database.php");

$database = new Database();
$db = $database->get_connection();

// Audit logout
$user_id = $_SESSION['id'];
$audit_details = array($_SESSION['id'], "LOGOUT", "user id [$user_id] succesfully logged out", date('Y-m-d H:m:s'));

insert_audit($db, $_SESSION['page'], $audit_details);

if(isset($_SESSION)){
    session_destroy();
}
header('Location: ../../index.php');
die;
?>