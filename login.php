<?php
$noLogin = 1;
include("init.php");
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
				<div class="main_content" style="width:100% !important;height:500px !important">
					<h2 class="title">Sign In</h2>
					<div class="col-md-6 col-md-push-3">
						<form id="login-form">
							<div class="col-xs-12">
								<div id="form-login-message"></div>
								 <input type="text" class="form-control hidden" name="role" id="role" value="user">
							</div>
							<div class="col-md-12 col-xs-12">
								<div class="form-group">
									<label>Username <i> * </i></label>
									<div class="input-group">
									  <span class="input-group-addon" id="basic-addon1"><i class="fas fa-envelope"></i></span>
									  <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" onfocus="this.value=''">
									</div>
								</div>
							</div>
							<div class="col-md-12 col-xs-12">
								<div class="form-group">
									<label>Password <i> * </i></label>
									<div class="input-group">
									  <span class="input-group-addon" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
									  <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" onfocus="this.value=''">
									</div>
								</div>
							</div>
							
							<div class="col-md-12 col-xs-12">
								<button type="submit" class="btn btn-submit pull-right">Sign in</button>
							</div>
							<br>
							<br>
							<br>
							<br>
							<div class="col-md-12 col-xs-12">
								<br>
								<h4 style="text-align:center;color:#2980B9;font-weight:bold" class="hidden">Forgot Password? <a href="forgot-password.php" style="font-size:14px;text-decoration:none;color:#EC7063"> Click Here.</a> </h4>
								<hr>
								<h4 style="text-align:center;font-weight:bold">Not Registered? Sign Up Now! </h4>
							</div>
							<div class="col-md-12 col-xs-12">
								<center>
									<a href="register.php" class="btn btn-primary"><i class="fas fa-hand-point-right"></i> REGISTER NOW</a>
								</center>
							</div>
						</form>
					</div>
				</div>						
			</div>
		</div>
	</div>	
</body>
</html>


<script>
	
$(document).ready(function(e)
{
	//form-content
	$("#login-form").on('submit',(function(e)
	{	
	
		e.preventDefault();
		
		var value = "";		
		var valid = "";
		
		//username
		value = document.getElementById("username").value.trim();
		if( value == null || value == "" )	
		{
			alert("Please enter username.");
			document.getElementById("username").focus();
			return false;
		}
		
		
		//password
		value = document.getElementById("password").value.trim();
		if( value == null || value == "" )	
		{
			alert("Please enter password.");
			document.getElementById("password").focus();
			return false;
		}
		
		
		var dialogOptions = {
			"progressType" : "success",
		};
		//waitingDialog.show('Please wait. Action in progress..!!');	
		
		$.ajax
		({
			url: "login-validate.php",
			type: "POST",
			contentType: false,
			cache: false,
			processData:false,
			data: new FormData(this),
			success: function(data)
			{
				if(data > 0)
				{
					alert("Login successfull.");
					window.location = "index.php";
				}
				else
				{
					alert("Invalid username / password");
					//waitingDialog.hide();
					location.reload();
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
	
</script>
