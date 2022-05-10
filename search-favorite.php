<?php
$noLogin = 1;
include ("init.php");

$keyword = "";
if (isset($_GET['q']))
{
    $keyword = $_GET['q'];
}
$advanceKey = explode(" OR ", $keyword);
//$userCategorys = ($loggedUser->getId());
$conn = mysqli_connect('localhost', 'krita_user', 'password1', "news");
//$query  = "SELECT * FROM `all_news` WHERE name like '%".$keyword."%'";
$query = "select * from all_categorys where title LIKE '%" . $keyword . "%'";

// if($advanceKey != null)
// {
// 	$query = "select * from all_news";
// 	for($i = 0; $i < sizeof($advanceKey); $i++)
// 	{
// 		$temp = trim($advanceKey[$i]);
// 		if( $i == 0 )
// 		{
// 			$query = $query . " where name like '%" . $temp . "%'";
// 		}
// 		else
// 		{
// 			$query = $query . " or name like '%" . $temp . "%'";
// 		}
// 	}
// 	$results = mysqli_query($conn, $query);
// }
$results = mysqli_query($conn, $query);
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

			<p><?php echo 12313123123123; ?></p>
			
			<div class="content_area">
				<div class="main_content" style="width:100% !important">   
					<h2 class="title"><?php echo "Search Results for " . "'<b>" . $keyword . "'</b>"; ?></h2>
										
					<?php
if (mysqli_num_rows($results) > 0)
{
    while ($rows = mysqli_fetch_assoc($results))
    {

        $name = $rows['title'];
        $description = $rows['description'];
        $category = $rows['currentDate'];

        //  $name = str_replace("'","\'",$name);
        //  $description = str_replace("'","\'",$description);
        $newsid = $rows['id'];

        ////////////////////start
        $userCategorys = ($loggedUser->getId());
        // $query = "select * from `newsuser` WHERE user_id =$userCategorys ORDER BY id DESC";
        //$query = "select * from `newsuser` WHERE user_id like '%".$userCategorys."%' ORDER BY id DESC";
        $query = "select * from `newsuser` WHERE user_id like '" . $userCategorys . "' ";
        $allfavResults = mysqli_query($conn, $query);
        while ($rows = mysqli_fetch_assoc($allfavResults))
        {
            $fav_userid = $rows['user_id'];
            $fav_newsid = $rows['news_id'];
			
			if($newsid == $fav_newsid){ ?>
				<div style="background:#fbfbfb;margin-bottom:10px;padding:0 0px 0 10px;border:#eee solid 1px">
					<h3><?php echo $name; ?></h3>
					<p class="readmore"></p>
					<p><?php echo $description; ?></p>
					<p  class="readmore pull-left" style="background:#faebd7;display:inline-block;padding:0px 20px 0 20px"><?php echo $category; ?></p>
				</div>
		<?php
			}

        }
        /////////////////////////end
        
?>
							
						<?php
    }
}

else
{
?>
						<center>
							<h2 style="margin-top:30px"> No Results found..! </h2>
							<p style="margin-bottom:40px"> Your Search - <b style="font-size:20px;"><?php echo $keyword; ?></b> - did not match any documents.</p>
						</center>
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

</style>
