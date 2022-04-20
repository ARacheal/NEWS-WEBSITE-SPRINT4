<?php
$noLogin = 1;
include("init.php");

include("api.php");

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
					<?php					
					foreach($newsData->sources as $news)
					{
						/*
						$s = $news->publishedAt;
						$date = strtotime($s);
						*/
						
					?>
						<div style="background:#fbfbfb;margin-bottom:10px;padding:0 0px 0 10px;border:#eee solid 1px">
							<h3><?php echo $news->name ?></h3>
							<p class="readmore"></p>
							<p><?php echo $news->description ?></p>
							<p  class="readmore pull-left" style="background:#faebd7;display:inline-block;padding:0px 20px 0 20px"><?php echo $news->category ?></p>
							
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
.main_content .readmoreee
{
	text-decoration:none !important;	
}
</style>

