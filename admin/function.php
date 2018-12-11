<?php
include 'dbconnect.php';
?>
<?php 
function debugger($data,$isdie=false)
{
	
	echo "<pre>";
	print_r($data);
	echo "</pre>";
	if($isdie)
	{
		exit;
	}
}


function getUserByUsername($user){
	global $conn;
	$sql="SELECT * FROM users WHERE username = '".$user."' AND status = 1";
	$query=$conn->query($sql);
	if($query-> num_rows<=0)
	{
		return false;
	}
	else
	{
		$data=$query->fetch_assoc();
		return $data;
	}
}
	function sanitize($string)
	{
		global $conn;
		return $conn->real_escape_string($string);
	}
	function addCategory($data)
	{
		global $conn;
		$sql="INSERT into categories SET title='".$data['title']."', summary='".$data['summary']."',description='".$data['description']."', status = ".(int)$data['status'];
		$query=$conn->query($sql);
		if($query)
			{
				return($conn->insert_id);
			}
			else
			{
				return false;
			}
	}

	function insertComment($data)
	{
		global $conn;
		$sql="INSERT into contacts SET name='".$data['name']."', email='".$data['email']."',description='".$data['description']."'";
		//debugger($sql,true);
		$query=$conn->query($sql);
		if($query)
			{
				return($conn->insert_id);
			}
			else
			{
				return false;
			}
	}


	function insertNews($data)
	{
		global $conn;
		$sql = "INSERT into news SET title = '".$data['title']."', category_id='".$data['category_id']."', banner='".$data['banner']."', description='".$data['description']."', status= '".$data['status']."', is_trending='".$data['is_trending']."', is_featured = '".$data['is_featured']."', added_by='".$data['added_by']."'";
		$query = $conn->query($sql);
		if($query)
		{
			return ($conn->insert_id);
		}
		else
		{
			return false;
		}
	}

	function insertNewImage($file_name , $news_id)
	{
		global $conn;
		$sql = "INSERT into news_images SET image_name = '".$file_name."' , news_id = '".$news_id."'";
		//debugger($sql,true);
		$query = $conn->query($sql);
		if($query)
		{
			return ($conn->insert_id);
		}
		else
		{
			return false;
		}

	}
	function getNewsImage($news_id)
	{
		global $conn;
		$sql = "SELECT * FROM news_images where news_id =".$news_id;
		$query = $conn->query($sql);
		if($query->num_rows<=0)
		{
			return false;
		}
		else{
			$data=array();
			while($rows=$query->fetch_assoc())
			{
				$data[]=$rows;
			}
			return $data;
		}

	}


	function getAllCategory($where=" " , $orderBy = " ")
	{
		global $conn;
		$sql="SELECT * FROM categories ".$where.$orderBy;
		$query=$conn->query($sql);
		if($query->num_rows<=0)
		{
			return false;
		}
		else{
			$data=array();
			while($rows=$query->fetch_assoc())
			{
				$data[]=$rows;
			}
			return $data;
		}
	}
	function getCategoryTitle($id)
	{
		global $conn;
		$sql = "SELECT * FROM categories where id=".$id;
		$query = $conn->query($sql);
		if($query->num_rows<=0)
		{
			return false;
		}
		else
		{
			$data=array();
			while($rows=$query->fetch_assoc())
			{
				$data[]=$rows;
			}
			return $data;
		}
	}

	function getAllNews($where=" ")
	{
		global $conn;
		$sql="SELECT * FROM news ".$where." ORDER BY id desc LIMIT 0,20;";
		$query=$conn->query($sql);
		if($query->num_rows<=0)
		{
			return false;
		}
		else{
			$data=array();
			while($rows=$query->fetch_assoc())
			{
				$data[]=$rows;
			}
			return $data;
		}
	}
		function getNewsByCatId($id)
	{
		global $conn;
		$sql="SELECT * FROM news WHERE status= 1 && category_id=".$id." ORDER BY id desc LIMIT 0,20;";
		//debugger($sql,true);
		$query=$conn->query($sql);
		if($query->num_rows<=0)
		{
			return false;
		}
		else{
			$data=array();
			while($rows=$query->fetch_assoc())
			{
				$data[]=$rows;
			}
			return $data;
		}
	}

	function getTrendingNews()
	{
		global $conn;
		$sql="SELECT * FROM news WHERE is_trending= 1 && status = 1 ORDER BY id desc LIMIT 0,20;";
		//debugger($sql,true);
		$query=$conn->query($sql);
		if($query->num_rows<=0)
		{
			return false;
		}
		else{
			$data=array();
			while($rows=$query->fetch_assoc())
			{
				$data[]=$rows;
			}
			return $data;
		}
	}

	function getFeaturedNews()
	{
		global $conn;
		$sql="SELECT * FROM news WHERE is_featured= 1 && status = 1 ORDER BY id desc LIMIT 0,20;";
		//debugger($sql,true);
		$query=$conn->query($sql);
		if($query->num_rows<=0)
		{
			return false;
		}
		else{
			$data=array();
			while($rows=$query->fetch_assoc())
			{
				$data[]=$rows;
			}
			return $data;
		}
	}

	function status ($status){
		if($status==1)
		{
			return "active";
		} else {
			return "inactive";
	}}

	function getDataById($table, $id)
	{
		global $conn;
		$sql="SELECT * FROM ".$table." WHERE id=".$id;
		$query= $conn->query($sql);
		if ($query->num_rows<=0)
		{
			return false;
		}
		else {
			$data=$query->fetch_assoc();
			return $data;
		}
	}
	function deleteData($table,$field,$value)
	{
		global $conn;
		$sql="DELETE FROM ".$table." WHERE ".$field." = ";
		if(is_int($value))
		{
			$sql.=$value;
		}
		else 
		{
			$sql.="'".$value."'";
		}
		$query=$conn->query($sql);
		return $query;
	}


	function updateCategory($data)
	{
		global $conn;
		$sql="UPDATE categories SET title='".$data['title']."', summary='".$data['summary']."',description='".$data['description']."', status = ".(int)$data['status']." WHERE id = ".$data['category_id'];
		$query=$conn->query($sql);
		if($query)
			{
				return($data['category_id']);
			}
			else
			{
				return false;
			}
	}

	function getLatestNews()
	{
		global $conn;
		$sql = "SELECT * FROM news ORDER BY added_date DESC ";
		$query = $conn->query($sql);
		if ($query->num_rows<=0)
		{
			return false;
		}
		else {
			$data=array();
			while($rows=$query->fetch_assoc())
			{
				$data[]=$rows;
			}
			return $data;
		}
	}

 ?>
 