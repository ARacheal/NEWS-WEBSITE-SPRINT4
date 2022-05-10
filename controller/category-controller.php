<?php
include('category-model.php');
class CategoryController
{
	private function createObjects($query)
	{
		include('db_connection.php');		
		$rss = mysqli_query($db_connection,$query);			
		$categorys = array();		
		while($rs=mysqli_fetch_array($rss))
		{
			$category = new Category($rs['id'], $rs['name'], $rs['url'], $rs['status']);			
			array_push($categorys, $category);
		}
		return $categorys;
	}


	private function createObject($query)
	{
		include('db_connection.php');
		$rss = mysqli_query($db_connection,$query);
		$category = null;
		while($rs=mysqli_fetch_array($rss))
		{
			$category = new Category($rs['id'], $rs['name'], $rs['url'], $rs['status']);
		}
		return $category;
	}
	
	public function getById($id)
	{
		include('db_connection.php');
		$query = "select * from `category` where `id` = '$id'";
		$categoryController = new CategoryController();
		$category = $categoryController->createObject($query);
		return $category;
	}

	public function getnewsById($id)
	{
		include('db_connection.php');
		$query = "select * from `all_categorys` where `id` = '$id'";
	//	$categoryController = new CategoryController();
	//	$category = $categoryController->createObject($query);
		$category = mysqli_query($db_connection,$query);
		return $category;
	}
	
	public function getByIds($ids)
	{
		include('db_connection.php');
		$categorys = array();
		if(strlen($ids)>0)
		{
			$query="select * from `category` where `id`in(" . $ids . ")";
			$categoryController = new CategoryController();
			$categorys = $categoryController->createObjects($query);
		}
		return $categorys;
	}
	
	
	public function getAll($status)
	{
		include('db_connection.php');
		$query = "select * from `category`";
		if( $status != null ) 
		{
			$query = $query . " where status = '" . $status . "'";
		}
		$categoryController = new CategoryController();
		return $categoryController->createObjects($query);
	}	
	
	public function getByUrl($url)
	{
		include('db_connection.php');
		$query = "select * from `category` where `url` = '$url'";
		$categoryController = new CategoryController();
		$category = $categoryController->createObject($query);
		return $category;
	}
	
	public function add($name, $url)
	{
		include('db_connection.php');
		$query ="INSERT INTO `category`(`name`, `url`) VALUES ('$name','$url')";
		mysqli_query($db_connection,$query);
		return mysqli_insert_id($db_connection);
	}
	
	public function update($id, $name, $url)
	{
		include('db_connection.php');
		$query ="UPDATE `category` SET `name`='$name', `url`='$url' where `id`= '$id'";
		return mysqli_query($db_connection,$query);
	}
		
	public function delete($id)
	{
		include('db_connection.php');
		$query ="delete from `category` where `id`= '$id'";
		return mysqli_query($db_connection,$query);
	}
	
}

?>