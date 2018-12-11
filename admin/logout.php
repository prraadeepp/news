<?php
include 'header.php';
session_destroy();
session_start();
$_SESSION['error']="you can Log in again by entering your username and password!";
 header("location:login.php");
exit;
?>