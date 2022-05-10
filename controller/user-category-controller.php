<?php
include('user-category-model.php');
class UserCategoryController
{
	private function createObjects($query)
	{
		include('db_connection.php');		
		$rss = mysqli_query($db_connection,$query);			
		$userCategorys = array();
		$userIds = "0";		
		$categoryIds = "0";		
		while($rs=mysqli_fetch_array($rss))
		{
			$userCategory = new UserCategory($rs['id'], $rs['userId'], $rs['categoryId'], $rs['status']);			
			array_push($userCategorys, $userCategory);
			$userIds = $userIds . "," . $userCategory->getUserId();
			$categoryIds = $categoryIds . "," . $userCategory->getCategoryId();
		}
		if( sizeof($userCategorys) > 0 )
		{			
			$userController = new UserController();			
			$categoryController = new CategoryController();	
			
			$users = $userController->getByIds($userIds);
			$categorys = $categoryController->getByIds($categoryIds);
			
			foreach($userCategorys as $userCategory)
			{				
				foreach($users as $user)
				{
					if( $userCategory->getUserId() == $user->getId() )
					{
						$userCategory->setUser($user);
					}
				}
				foreach($categorys as $category)
				{
					if( $userCategory->getCategoryId() == $category->getId() )
					{
						$userCategory->setCategory($category);
					}
				}
			}
		}
		return $userCategorys;
	}


	private function createObject($query)
	{
		include('db_connection.php');
		$rss = mysqli_query($db_connection,$query);
		$userCategory = null;
		$userIds = "0";
		$categoryIds = "0";	
		while($rs=mysqli_fetch_array($rss))
		{
			$userCategory = new UserCategory($rs['id'], $rs['userId'], $rs['categoryId'], $rs['status']);	
			$userIds = $userIds . "," . $userCategory->getUserId();
			$categoryIds = $categoryIds . "," . $userCategory->getCategoryId();
		}
		if( $userCategory != null )
		{
			$userController = new UserController();			
			$categoryController = new CategoryController();	
			
			$users = $userController->getByIds($userIds);
			$categorys = $categoryController->getByIds($categoryIds);
			
			foreach($users as $user)
			{
				if( $userCategory->getUserId() == $user->getId() )
				{
					$userCategory->setUser($user);
				}
			}
			foreach($categorys as $category)
			{
				if( $userCategory->getCategoryId() == $category->getId() )
				{
					$userCategory->setCategory($category);
				}
			}

		}
		return $userCategory;
	}
	
	
	public function getById($id)
	{
		include('db_connection.php');
		$query = "select * from `user_category` where `id` = '$id'";
		$userCategoryController = new UserCategoryController();
		$userCategory = $userCategoryController->createObject($query);
		return $userCategory;
	}
	
	public function getByIds($ids)
	{
		include('db_connection.php');
		$salespersons = array();
		if(strlen($ids)>0)
		{
			$query="select * from `user_category` where `id` in(" . $ids . ")";
			$userCategoryController = new UserCategoryController();
			$userCategory = $userCategoryController->createObjects($query);
		}
		return $userCategorys;
	}
	
	
	public function getAll($status)
	{
		include('db_connection.php');
		$query = "select * from `user_category`";
		if( $status != null ) 
		{
			$query = $query . " where status = '" . $status . "'";
		}
		$userCategoryController = new UserCategoryController();
		return $userCategoryController->createObjects($query);
	}
	
	public function getByUserId($userId)
	{
		include('db_connection.php');
		$query = "select * from `user_category` where `userId` = '$userId'";
		$userCategoryController = new UserCategoryController();
		$userCategorys = $userCategoryController->createObjects($query);
		return $userCategorys;
	}
	
	public function add($userId, $categoryId)
	{
		include('db_connection.php');
		$query ="INSERT INTO `user_category`(`userId`, `categoryId`) VALUES ('$userId','$categoryId')";
		mysqli_query($db_connection,$query);
		return mysqli_insert_id($db_connection);
	}
	
	public function addBulk($query)
	{
		include('db_connection.php');
		mysqli_multi_query($db_connection,$query);
	}
	
	public function delete($id)
	{
		include('db_connection.php');
		$query ="delete from `user_category` where `id`= '$id'";
		return mysqli_query($db_connection,$query);
	}
	
	public function deleteByUserId($userId)
	{
		include('db_connection.php');
		$query ="delete from `user_category` where `userId`= '$userId'";
		return mysqli_query($db_connection,$query);
	}
	
}

?>