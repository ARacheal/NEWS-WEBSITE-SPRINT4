<?php
$noLogin = 1;
include ("init.php");

$conn = mysqli_connect('localhost', 'krita_user', 'password1', "news");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Personal News Articles</title>
<?php include ("head.php"); ?>
</head>
<body>
	<div class="body_wrapper">
		<div class="center">
        <?php include ("menu.php"); ?>  
        <div class="content_area">
				<div class="main_content" style="width:100% !important">   
					<h2 class="title" ><?php echo 'Favorite news'; ?></h2>
                    <?php include("search-favorite-box.php"); ?>
					<?php
                        $userCategorys = ($loggedUser->getId());
                        // $query = "select * from `newsuser` WHERE user_id =$userCategorys ORDER BY id DESC";
                        //$query = "select * from `newsuser` WHERE user_id like '%".$userCategorys."%' ORDER BY id DESC";
                        $query = "select * from `newsuser` WHERE user_id like '" . $userCategorys . "'";
                        $allfavResults = mysqli_query($conn, $query);
                        while ($rows = mysqli_fetch_assoc($allfavResults))
                        {
                            $fav_userid = $rows['user_id'];
                            $fav_newsid = $rows['news_id'];
                            $allNewsResults = $categoryController->getnewsById($fav_newsid);
                            $rows = mysqli_fetch_assoc($allNewsResults);
                            $allCategorysname = $rows['title'];
                            $allCategorysDescription = $rows['description'];
                            $allCategorysId = $rows['categoryId'];
                            $allCategoryDate = $rows['currentDate'];
                    ?>
						<div style="background:#fbfbfb;margin-bottom:10px;padding:0 0px 0 10px;border:#eee solid 1px">
                            <table>
                                <tr>
                                    <td>
                                          <h3 style="line-height:30px;"><?php echo $allCategorysname; ?></h3>
							              <p class="readmore"><?php echo $allCategoryDate; ?></p>
							              <p><?php echo $allCategorysDescription; ?></p>
                                    </td>
                                    <td width="3%">
                                            <a class="btn btn-danger" href="favorite-delete.php?newsid=<?php echo($fav_newsid)?>&userid=<?php echo($fav_userid)?>">Remove</a>
                                    </td>
                                </tr>
                            </table>
						</div>
					<?php

                    }
                    ?>
				</div>						
			</div>
            
		</div>
	</div>	
</body>
</html>

<style>

.main_content h3
{
	font-size:16px;
	margin-bottom:10px;
}
.main_content p
{
	line-height:30px;
	font-size:14px;
	padding-left:20px;
}
.main_content .readmore
{
	text-decoration:none !important;	
}

.page {text-align: center;}
.page li{display: inline-block;}
.page li a{
    display: inline-block;
    padding: 5px 10px;
    margin: 0 2px 5px;
    border: 1px solid #ff5454;
    font-size: 12px;
    font-weight: 700;
}
</style>
