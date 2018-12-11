<?php
session_start();
	include 'function.php';
?>
<?php 

if(isset($_POST['submit']) && $_POST['submit']!="")
{	/*debugger($_POST,true);*/
	$data=array();
	$data['title']=sanitize($_POST['title']);
	$data['description']=sanitize($_POST['description']);
	$data['summary']=sanitize($_POST['summary']);
	$data['status']=sanitize($_POST['photo']);
	$data['category_id']=sanitize($_POST['category_id']);
	if($data['category_id']=="")
	{
	$last_insert = addCategory($data);
	if($last_insert)
	{
		$_SESSION['success']="inserted successfully";

	}
	else
	{
		$_SESSION['error']="invalid insertion of data";

	}
	}
	else 
	{
	$last_insert=updateCategory($data);
	if($last_insert)
	{
		$_SESSION['success']="updated successfully";

	}
	else
	{
		$_SESSION['error']="invalid update of data";

	}}
	@header("location:categorylist.php");
}
else if(isset($_GET['id']) && isset($_GET['act']))
	{
		$id = sanitize($_GET['id']);
		if($_GET['act']==substr(md5("delete-".$_GET['id']),07,17))
		{
		$data = getDataById(' categories ',$id);
		if($data)
		{
			$del=deleteData('categories','id',$id);
			if($del)
			{
				$_SESSION['success']="Category deleted successfully";
			}
			else {
				$_SESSION['error']="Sorry! There was problem in deleting the data";
			}
		}else {
			$_SESSION['error']="Sorry! The data doesnot exist.";
		}
		@header("location:categorylist.php");
		exit;
		}
		else
		{
			$_SESSION['error']="illegal action!";
			@header("location:categorylist.php");
			exit;
		}
}
else
{
	$_SESSION['error']="invalid entry";
	@header("location:index.php");
}
?>