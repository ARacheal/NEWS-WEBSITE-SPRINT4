<?php

include('init.php');

$newsid = $_GET['newsid'];
$userid = $_GET['userid'];
$userfavoriteController->deleteFavoritenews($userid, $newsid);

header("location: favorite.php");
exit();

?>