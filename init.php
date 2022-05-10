<?php

session_start();
ob_start();

/**
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
**/

include('controller/user-controller.php');
include('controller/category-controller.php');
include('controller/user-category-controller.php');
include('controller/favorite-controller.php');

$userController = new UserController();
$categoryController = new CategoryController();
$userCategoryController = new UserCategoryController();
$userfavoriteController = new FavoriteController();

//logged user details
if( !isset( $noLogin ))
{
	include("logged-user-detail.php");
}

include("logged-user-detail.php");


//system variable
$systemHostlink = "http://$_SERVER[HTTP_HOST]" . "/news-sprint4/";
$systemPagelink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$systemImage404 = $systemHostlink . "media/system/image404.png";


?>


