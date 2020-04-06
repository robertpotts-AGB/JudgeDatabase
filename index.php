<?php
session_start();
if(!empty($_SESSION["userId"])) {
    //require_once './view/dashboard.php';
    header("Location: ./view/dashboard.php");
} else {
    require_once './view/login-form.php';
}
?>