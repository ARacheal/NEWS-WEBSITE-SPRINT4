<?php
$noLogin = 1;
include("init.php");
//include("api.php");

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
			
			<div class="content_area">
				<div class="main_content" style="width:100% !important">   
					<h2 class="title"><?php echo "All News" ?></h2>
					<?php include("search-box.php"); ?>
										
					<?php
					
						if($loggedUser != null)
						{
							$userCategorys = $userCategoryController->getByUserId($loggedUser->getId());						
							foreach($userCategorys as $userCategory)
							{
								$category = $categoryController->getById($userCategory->getCategoryId());
								//$url = $category->getUrl();
								//$response = file_get_contents($url);
								//$newsData = json_decode($response);
								
								$categoryName = $category->getName();
								
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
								$fav_userid = ($loggedUser->getId());					
								$query = "select * from `all_categorys` ORDER BY id DESC LIMIT $start_from, $limit";
								$allNewsResults = mysqli_query($conn, $query);
								while($rows1 = mysqli_fetch_assoc($allNewsResults))
								{
									$fav_newsid = $rows1['id'];
									$allCategorysname = $rows1['title'];
									$allCategorysDescription = $rows1['description'];
									$allCategorysId = $rows1['categoryId'];				
									$allCategoryDate = $rows1['currentDate'];
									
								?>
									<div style="background:#fbfbfb;margin-bottom:10px;padding:0 0px 0 10px;border:#eee solid 1px">
									<table>
										<tr>
											<td>
                                             <h3 style="line-height:30px;"><?php echo $allCategorysname; ?></h3>
										     <p class="readmore"> <b style="background:#000;padding:5px;color:#fff;border-radius:5px;"><?php echo $categoryName; ?></b>&nbsp;&nbsp;<?php echo $allCategoryDate; ?></p>
                                             <p><?php echo $allCategorysDescription; ?></p>
											 
											</td>
											<td  width='3%'>
											<a class="btn btn-primary" href="favorite-insert.php?newsid=<?php echo($fav_newsid)?>&userid=<?php echo($fav_userid)?>">Favorite</a>
											</td>
										</tr>
										</table>								
									</div>
									
								<?php
								}
								
							}
							if(sizeof($userCategorys) > 0)
							{
								$query4 = "select COUNT(id) from `all_categorys`";
								$result2 = mysqli_query($conn, $query4);
								$row2 = mysqli_fetch_row($result2);
								$total_records = $row2[0];
								$total_pages = ceil($total_records / $limit);
								$pageLink = "<ul class='page'>";
								for($i=1; $i <= $total_pages; $i++)
								{
									$pageLink .="<li><a href='index.php?page=".$i ."'>".$i."</a></li>";
								}
								
								echo $pageLink;"</ul>";
							}
							else
							{
								?>
									<h3 style="text-align:center;font-size:20px"> Please select any one category </h3>
								<?php
							}
						}
						?>
						
						<?php
						if($loggedUser == null)
						{						
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
							$query = "select * from `all_news` ORDER BY id DESC LIMIT $start_from, $limit";
							$allNewsResults = mysqli_query($conn, $query);
							while($rows = mysqli_fetch_assoc($allNewsResults))
							{
								$allNewsname = $rows['name'];
								$allNewsDescription = $rows['description'];
								$allNewsCategory = $rows['category'];				
											
								
							?>
								<div style="background:#fbfbfb;margin-bottom:10px;padding:0 0px 0 10px;border:#eee solid 1px">
									<h3><?php echo $allNewsname; ?></h3>
									<p class="readmore"></p>
									<p><?php echo $allNewsDescription; ?></p>
									<p  class="readmore pull-left" style="background:#faebd7;display:inline-block;padding:0px 20px 0 20px"><?php echo $allNewsCategory; ?></p>
								</div>
							<?php
							}
																	
						?>
						
						<?php
						$query4 = "select COUNT(id) from `all_news` order by id desc";
						$result2 = mysqli_query($conn, $query4);
						$row2 = mysqli_fetch_row($result2);
						$total_records = $row2[0];
						$total_pages = ceil($total_records / $limit);
						$pageLink = "<ul class='page'>";
						for($i=1; $i <= $total_pages; $i++)
						{
							$pageLink .="<li><a href='index.php?page=".$i ."'>".$i."</a></li>";
						}
						
						echo $pageLink;"</ul>";
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

