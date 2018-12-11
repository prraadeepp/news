<?php 
include "header.php";
include "sessioncall.php";
//debugger($_POST,true);
if(isset($_POST['submit']) && $_POST['submit']!= '')
{
	$data = array();
	$data['name'] = sanitize($_POST['name']);
	$data['email'] = ($_POST['email']);
	$data['description'] = sanitize($_POST['description']);
	//debugger($data,true);
	$success=insertComment($data);
	if ($success)
	{
		$_SESSION['success'] = "Your comment has been registered successfully. Thanks a lot for your suggestions.";
		@header("location: ../index.php");
		exit;
	}
	else 
{
	$_SESSION['error'] = "Sorry, there was some problem in registering your message.";
	@header("location: ../index.php");
	exit;

}

}
else 
{
	$_SESSION['error'] = "You are legally not allowed to reach this page.";
	@header("location: ../index.php");
	exit;

}

?>