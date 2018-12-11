<?php 
include "header.php";
include "sessioncall.php";
//debugger($_SESSION,true);
if (isset($_POST) && !empty($_POST))
{
	$data =array();
	$data['title'] = sanitize($_POST['title']);
	$data['category_id'] = $_POST['category_id'];
	$data['banner'] = $_POST['banner'];
	$data['description'] = ($_POST['description']);
	$data['status'] = $_POST['status'];
	$data['is_trending'] = $_POST['is_trending'];
	$data['is_featured'] = $_POST['is_featured'];
	$data['added_by'] = $_SESSION['user_id'];
	//debugger($_FILES,true);

	if($data)
	{
		$news_id=insertNews($data);
		if($news_id)
		{	
			if(isset($_FILES['images']) && !empty($_FILES['images']))
			{
				$upload_dir = '../uploads/';
				if(!is_dir($upload_dir))
				{
					mkdir($upload_dir);
				}
				$upload_path = $upload_dir."news_images/";
				if(!is_dir($upload_path))
				{
					mkdir($upload_path);
				}
				$files =array();
				$files = $_FILES['images'];
				for($i = 0; $i<count($files['tmp_name']);$i++)
				{
					$ext= pathinfo(($files['name'][$i]), PATHINFO_EXTENSION);
					if((in_array($ext, explode(',',ALLOWED_EXTENSION))) && $files['error'][$i]=="")
					{
						$filename = "News-images-".rand(0,9999999).".".$ext;
						$success = move_uploaded_file($files['tmp_name'][$i] , $upload_path.'/'.$filename);
						debugger($success);
						if($success)
						{
							$database = insertNewImage($filename, $news_id);
						}
					}
					else
					{
						$_SESSION['error'] = "News was inserted but there was a problem in uploading image to server!";
						@header('location:newslist.php');
						exit;	
					}
				}
				if($database)
				{
				$_SESSION['success']="News added successfully!";
				@header('location:newslist.php');
				exit;
				}
			}
			else
			{
			$_SESSION['success']="Data inserted successfully but image was not found for insertion!";
			@header("location:news-add.php");
			exit;
			}
		}
		else
		{
			$_SESSION['error'] = "There was a problem while inserting this data.";
			@header("location:news-add.php");
			exit;
		}
	}
	else
	{
		$_SESSION['error'] = "There was problem in receiving this data for insertion";
		@header("location: news-add.php");
		exit;
	}
}
else if (isset($_GET['id']) && $_GET['act']) 
{	
	$id = sanitize($_GET['id']);
	if($_GET['act'] == substr(md5("delete-".$id),07,17))
	{	
		//debugger($_GET,true);
		$data = getDataById(' news ', $id);
		//debugger($data,true);
		$image_data = getNewsImage($data['id']);
		//debugger($image_data,true);
		//debugger($data,true);
		if($data)
		{
			$delete = deleteData(' news ',' id ',$id);
			if($delete)
			{
				foreach ($image_data as $key => $imagedelete) 
				{
					$delete_images = deleteData(' news_images ', ' news_id ' , $imagedelete['news_id']);
					if($delete_images && file_exists("../uploads/news_images/".$imagedelete['image_name']))
					{	
						$y=unlink("../uploads/news_images/".$imagedelete['image_name']);
					}
					else
					{
						$_SESSION['success']="The news has been deleted but unable to delete images!";
						@header('location:newslist.php');
						exit;
					}
				}
				$_SESSION['success']="The news has been deleted successfully!";
				@header('location:newslist.php');
				exit;
			}
			else
			{
				$_SESSION['error']="There was a problem in deleting data!";
				@header('location:newslist.php');
				exit;
			}
		}
		else
		{
			$_SESSION['error']="The data doesnot exists or has been already deleted!";
			@header('location:newslist.php');
			exit;
		}
	}
	else
	{
		$_SESSION['error']="Illegal action!";
		@header('location:newslist.php');
		exit;
	}
}
else
{
	$_SESSION['error']="You donot have permission to access the requested location!";
	@header('location:newslist.php');
	exit;
}
?>