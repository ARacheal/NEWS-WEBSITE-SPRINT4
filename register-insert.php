<?php
$noLogin = 1;
include('init.php');

$name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

$user = $userController->getByUserName($name);

if( $user != null)
{
	echo "Username already exits.";
	exit();
}
else
{
	$userId = $userController->add($name, "", $email, $password, $role);
	echo $userId;
	exit();
}

?>