<?php
session_start();
if($_SESSION['isAuthenticated'] != 1 && !isset($_SESSION['isAuthenticated'])){
    session_destroy();
    header('Location: ../index.php');
    die;
}
?>