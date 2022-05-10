<?php
$noLogin = 1;
include("init.php");

$userCategorys = $userCategoryController->getByUserId($loggedUser->getId());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Personal News Articles</title>
<?php include("head.php"); ?>
</head>
<body>
	<div class="body_wrapper">
		<div class="center">
			<?php include("menu.php"); ?>
		
			<div class="content_area">
				<div class="main_content" style="width:100% !important">   
					<h2 class="title">Settings</h2>	
					<div class="col-md-6 col-md-push-3" style="border:#000 solid 2px">
						<h5 style="margin-left:100px;padding-top:20px;font-size:20px"> Choose your areas of interest </h5>
						<code class="hljs xml">
							<form action="user-category-insert.php" method="post" style="margin-left:100px" id="category-form">      
								<fieldset style="font-size:15px !important;padding-bottom:30px;">
									<?php
									$categorys = $categoryController->getAll(1);
									foreach($categorys as $category)
									{
										$categoryName = $category->getName();
										
										$checked = "";
										foreach($userCategorys as $userCategory)
										{
											if( $userCategory->getCategoryId() == $category->getId() )
											{
												$checked = "checked";
											}
										}
										
										
									?>
										<input type="checkbox" <?php echo $checked; ?> id="category_id" name="category[]" value="<?php echo $category->getId(); ?>" > <?php echo $category->getName(); ?><br>      
									 <?php
										
									}
									?>   
									<br>
									
									<div class="col-md-12" style="margin-top:30px">
										<div class="col-md-8">
											<a href="user-category-delete.php?id=<?php echo $loggedUser->getId(); ?>" class="btn btn-sm btn-danger pull-right" value="Cancel" style="padding:5px 20px 5px 20px;font-size:15px" onclick="return confirm('Are you sure you want to cancel?')"/> Cancel <a>
										</div>
										<div class="col-md-4">
											<button type="submit" class="btn btn-sm btn-success pull-left" value="Ok" style="padding:5px 20px 5px 20px;font-size:15px"/> Ok </button>
										</div>
									</div>
								</fieldset>      
							</form>
						</code>	
					</div>
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


<script>
/*
$(document).ready(function(e)
{

	//form-content
	$("#category-form").on('submit',(function(e)
	{	
	
		e.preventDefault();
		
		var value = "";		
		var valid = "";
		
		var value = document.getElementById("category_id").value;
		
		
		var dialogOptions = {
			"progressType" : "success",
		};
		//waitingDialog.show('Please wait. Action in progress..!!');	
		
		$.ajax
		({
			url: "user-category-insert.php",
			type: "POST",
			contentType: false,
			cache: false,
			processData:false,
			data: new FormData(this),
			success: function(data)
			{
				if(data > 0)
				{
					alert("Category added successfully");
					window.location = "index.php";
				}
				
			},
			error: function()
			{
				alert("Oops something went wrong. Please try later.");
				//waitingDialog.hide();
			}
		});
	}));
	
});
*/
</script>