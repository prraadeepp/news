<?php 
include 'config.php';
$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASS);
$db=$conn->select_db(DB_NAME);
?>