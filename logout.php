<?php
	include("init.php");
	$_SESSION['login'] = 0;
	unset($_SESSION['login']);
	unset($_SESSION['login_user_id']);
	session_destroy();
	header("location:login.php");
	exit();
?>