<?php
include('user-model.php');
class UserController
{
	private function createObjects($query)
	{
		include('db_connection.php');		
		$rss = mysqli_query($db_connection,$query);			
		$users = array();		
		while($rs=mysqli_fetch_array($rss))
		{
			$user = new User($rs['id'], $rs['name'], $rs['mobile'], $rs['email'], $rs['password'], $rs['role'], $rs['status']);			
			array_push($users, $user);
		}
		return $users;
	}


	private function createObject($query)
	{
		include('db_connection.php');
		$rss = mysqli_query($db_connection,$query);
		$user = null;
		while($rs=mysqli_fetch_array($rss))
		{
			$user = new User($rs['id'], $rs['name'], $rs['mobile'], $rs['email'], $rs['password'], $rs['role'], $rs['status']);
		}
		return $user;
	}
	
	public function getById($id)
	{
		include('db_connection.php');
		$query = "select * from `user` where `id` = '$id'";
		$userController = new UserController();
		$user = $userController->createObject($query);
		return $user;
	}
	
	public function getByIds($ids)
	{
		include('db_connection.php');
		$users = array();
		if(strlen($ids)>0)
		{
			$query="select * from `user` where `id`in(" . $ids . ")";
			$userController = new UserController();
			$users = $userController->createObjects($query);
		}
		return $users;
	}
	
	
	public function getAll($status)
	{
		include('db_connection.php');
		$query = "select * from `user`";
		if( $status != null ) 
		{
			$query = $query . " where status = '" . $status . "'";
		}
		$userController = new UserController();
		return $userController->createObjects($query);
	}
	
	public function getByLoginRole($username,$password,$role)
	{
		include('db_connection.php');
		$query="select * from `user` where name = '" . $username . "' and password = '" . $password . "' and role = '" . $role . "'";
		$userController = new UserController();
		$user = $userController->createObject($query);
		return $user;
	}
	
	public function getByUserName($username)
	{
		include('db_connection.php');
		$query="select * from `user` where name = '" . $username . "'";
		$userController = new UserController();
		$user = $userController->createObject($query);
		return $user;
	}

	
	public function add($name, $mobile, $email, $password, $role)
	{
		include('db_connection.php');
		$query ="INSERT INTO `user`(`name`, `mobile`, `email`, `password`, `role`) VALUES ('$name','$mobile','$email','$password','$role')";
		mysqli_query($db_connection,$query);
		return mysqli_insert_id($db_connection);
	}
	
	public function update($id, $name, $mobile)
	{
		include('db_connection.php');
		$query ="UPDATE `user` SET `name`='$name', `mobile`='$mobile' where `id`= '$id'";
		return mysqli_query($db_connection,$query);
	}
		
	public function updatePassword($id,$password)
	{
		include('db_connection.php');
		$query = "update `user` set `password`='$password' where `id`='$id'";
		return mysqli_query($db_connection,$query);
	}
	
	public function delete($id)
	{
		include('db_connection.php');
		$query ="delete from `user` where `id`= '$id'";
		return mysqli_query($db_connection,$query);
	}
	
}

?>