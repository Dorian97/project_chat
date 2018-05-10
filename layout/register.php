<?php
	
	$msg_error   = "";
	$msg_success = "";
	if(isset($_GET['error']))
	{
		if($_GET['error'] == 'existing_user')
		{
			$msg_error = "There is an user already registered with this email...";
		}
		if($_GET['error'] == 'sth_went_wrong')
		{
			$msg_error = "Something went wrong! Please try again!";
		}
		if($_GET['error'] == 'psd_not_eq')
		{
			$msg_error = "Password and Confirmed Password are not the same...";
		}
	}
	if(isset($_GET['success']))
	{
		if($_GET['success'] == 'email_sent')
		{
			$msg_success = "You have been registered! Please verify your email!";
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
		<meta charset="UTF-8">
		<title>Project</title>
		<link rel="stylesheet" type="text/css" href="../style/style.css"/>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="form">
				<?php
					if(!empty($msg_error))
					{
				?>
					  <div class='alert'>
					  <span class='closebtn' onclick="this.parentElement.style.display='none';">&times;</span>&nbsp;&nbsp;
					  <?=$msg_error;?>
					  </div>
					  <br>
				<?php
					}
					
					if(!empty($msg_success))
					{
				?>
					  <div class='success'>
					  <span class='closebtn' onclick="this.parentElement.style.display='none';">&times;</span>&nbsp;&nbsp;
					  <?=$msg_success;?>
					  </div>
					  <br>
				<?php
					header("refresh:2;url=./login.php");
					}
				?>
				
				<div class="allignment">
					<img src="../images/user2.png" alt="user">
				</div>
				<br>
				<form action="./../functionality/register.functionality.php" method="POST">
					
					<div class="allignment2">
						<input id="first_name_id" type="text" name="first_name" placeholder="Your First Name.." required="required">
					</div>
					<div class="allignment2">
						<input id="last_name_id" type="text" name="last_name" placeholder="Your Last Name.." required="required">
					</div>
					<div class="allignment2">
						<input id="email_id" type="email" name="email" placeholder="Your email.." required="required">
					</div>
					<div class="allignment2">
						<input id="password_id" type="password" name="password" placeholder="Your password.." required="required">
					</div>
					<div id="confirm_password" class="allignment2">
						<input id="confirm_password_id" type="password" name="confirm_password" placeholder="Confirm your password.." required="required">
					</div>
					<div class="allignment">
						<input type="submit" id="button_login" name="register" value="CREATE ACCOUNT"/>
					</div>
					<div id="message-allign">
						<p class="message">Already have an account?<a href="./login.php"> Click to Log in!</a></p>
					</div>
					<br>
					<br>
				</form>
				<br>
				<br>
			</div>
		</div>
	</div>
	
	<script>
		
	</script>
	
</body>
</html>

