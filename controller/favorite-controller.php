<?php
include('favorite-controller-model.php');
class FavoriteController
{
    public function insertFavoritenews($usrid, $newsid){
        include('db_connection.php');
        $query ="INSERT INTO `newsuser`(`user_id`, `news_id`) VALUES ('$usrid','$newsid')";
        $NewsResult = mysqli_query($db_connection, $query);
        if($NewsResult){
            echo '<script>alert("Welcome to Geeks for Geeks")</script>';
        }
        else{
            echo '<script>alert("failure")</script>';
        }
       // return $NewsResult;
    }
    public function deleteFavoritenews($userid, $newsid){
        include('db_connection.php');
        $query = "DELETE FROM newsuser WHERE user_id='$userid' and news_id = '$newsid'";
        $NewsResult = mysqli_query($db_connection, $query);
        
        if($NewsResult){
            echo '<script>alert("Welcome to Geeks for Geeks")</script>';
        }
        else{
            echo '<script>alert("failure")</script>';
        }
    }
    public function deleteFavoritenewsAll(){
        include('db_connection.php');
        $query = "select * from `all_categorys` WHERE id like '".$fav_newsid."' ORDER BY id DESC";
        $NewsResult = mysqli_query($db_connection, $query);
        
        return $NewsResult;
    }	
}

?>