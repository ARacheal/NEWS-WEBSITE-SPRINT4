<?php

include('init.php');

$userId = $_GET['id'];

$userCategoryController->deleteByUserId($userId);

header("location: settings.php");
exit();

?>