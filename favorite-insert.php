<?php

include('init.php');

$newsid = $_GET['newsid'];
$userid = $_GET['userid'];
$userfavoriteController->insertFavoritenews($userid, $newsid);

header("location: favorite.php");
exit();

?>