<?php
$noLogin = 1;
include('init.php');

$username = $_POST['username'];
$password = $_POST['password'];
$role = "user";

$user = $userController->getByLoginRole($username,$password,$role);

if( $user != null )	
{		
	$_SESSION['login'] = 1;
	$_SESSION['login_user_id'] = $user->getId();
	echo $user->getId();
}
else
{
	echo 0;
}

exit();
?>