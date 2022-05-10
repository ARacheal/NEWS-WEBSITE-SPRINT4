<?php
$noLogin = 1;
include("init.php");
/*
$keyword = $_GET['q'];
$getCategoryId = $_GET['category_id'];
$conn = mysqli_connect('localhost','krita_user','password1',"news");
$query  = "SELECT `all_categorys`.* FROM `all_categorys` WHERE `title` LIKE '%".$keyword."%' and `all_categorys`.categoryId=" . $getCategoryId;
$results = mysqli_query($conn, $query);	
*/
$conn = mysqli_connect('localhost','krita_user','password1',"news");

$getCategoryId = 0;
if ( isset($_GET['category_id']) )
{
	$getCategoryId = $_GET['category_id'];
}
$query = "select * from category where id=".$getCategoryId;
$categoryResults = mysqli_query($conn, $query);
while($rows = mysqli_fetch_assoc($categoryResults))
{
	$categoryName = $rows['name'];
}


$keyword = "";
if( isset($_GET['q']) )
{
	$keyword = $_GET['q'];
}
$advanceKey = explode(" OR ", $keyword);

$query  = "select * from all_categorys,category where all_categorys.categoryId = category.id and category.id = ". $getCategoryId." and title LIKE '%" . $keyword. "%'";
echo $query;
if($advanceKey != null)
{	
	$query = "select * from all_categorys";
	for($i = 0; $i < sizeof($advanceKey); $i++)
	{
		$temp = trim($advanceKey[$i]);
		if( $i == 0 )
		{
			$query = $query . " where title like '%" . $temp . "%'";
			
		}
		else
		{
			$query = $query . " or title like '%" . $temp . "%'";
			//echo $query;
		}
	}
	
	$results = mysqli_query($conn, $query);
}

$results = mysqli_query($conn, $query);			
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Personal News Articles</title>
<?php include("head.php");?>
</head>
<body>
	<div class="body_wrapper">
		<div class="center">
			<?php include("menu.php"); ?>
			
			<div class="content_area">
				<div class="main_content" style="width:100% !important">   
					<h2 class="title"><?php echo "Search Results for " . "<b>'" . $keyword ."'</b> [ <span style='color:#f00'> " . $categoryName. " </span>]"; ?></h2>
										
					<?php
					if(mysqli_num_rows($results) > 0) 
					{
						while($rows = mysqli_fetch_assoc($results))
						{						
							
							$title = $rows['title'];
							$description = $rows['description'];
							$category = $rows['categoryId'];
							$currentDate = $rows['currentDate'];

							//$categoryName = $category->getName();
							
							$title = str_replace("'","\'",$title);
							$description = str_replace("'","\'",$description);						
							
						?>
							<div style="background:#fbfbfb;margin-bottom:10px;padding:0 0px 0 10px;border:#eee solid 1px">
								<h3><?php echo $title; ?></h3>
								<p class="readmore"></p>
								<p><?php echo $description; ?></p>
								<p  class="readmore pull-left" style="background:#faebd7;display:inline-block;padding:0px 20px 0 20px"><?php echo $currentDate; ?></p>
							</div>
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

