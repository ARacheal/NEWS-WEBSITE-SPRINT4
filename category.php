<?php
$noLogin = 1;
include("init.php");

$conn = mysqli_connect('localhost','krita_user','password1',"news");
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
			<?php
			if( !isset($_GET['id']) )
			{
				header('location: index.php');
				exit();
			}

			$getcategoryId = $_GET['id'];
			$category = $categoryController->getById($getcategoryId);

			if( $category == null )
			{
				header('location: index.php');
				exit();	
			}
			//$url = $category->getUrl();
			//$response = file_get_contents($url);
			//$newsData = json_decode($response);
			?>
		
			<div class="content_area">
				<div class="main_content" style="width:100% !important">   
					<h2 class="title" ><?php echo $category->getName(); ?></h2>
					<?php include("search-category-box.php"); ?>
					<?php
					$limit = 10;
					if (isset($_GET["page"])) 
					{ 
						$page = $_GET["page"]; 
					} 
					else 
					{ 
						$page=1; 
					}
					$start_from = ($page-1) * $limit;
										
					$query = "select * from `all_categorys` WHERE categoryId like '".$getcategoryId."' ORDER BY id DESC LIMIT $start_from, $limit";
				//	$query = "select * from `all_categorys` ORDER BY id DESC LIMIT $start_from, $limit";
					$allNewsResults = mysqli_query($conn, $query);
					
					while($rows = mysqli_fetch_assoc($allNewsResults))
					{
						$fav_newsid = $rows['id'];
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
										<?php
										if($loggedUser != null){
											$fav_userid = ($loggedUser->getId()); ?>
										<a class="btn btn-primary" href="favorite-insert.php?newsid=<?php echo($fav_newsid)?>&userid=<?php echo($fav_userid)?>">Favorite</a>
										<?php
										} else {?>
										 <a class="btn btn-primary">Favorite</a>
										 <?php
										 }
										 ?>
									</td>
								</tr>
							<table>							
						</div>
						
					<?php
					}
					?>
					<?php
					$query4 = "select COUNT(id) from `all_categorys`";
					$result2 = mysqli_query($conn, $query4);
					$row2 = mysqli_fetch_row($result2);
					$total_records = $row2[0];
					$total_pages = ceil($total_records / $limit);
					$pageLink = "<ul class='page'>";
					for($i=1; $i <= $total_pages; $i++)
					{
						$pageLink .="<li><a href='category.php?id=".$category->getId()."&page=".$i ."'>".$i."</a></li>";
					}
					
					echo $pageLink;"</ul>";
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