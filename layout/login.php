<?php
	$msg_error   = "";
	$msg_success = "";
	if(isset($_GET['error']))
	{
		if($_GET['error'] == 'check_inputs')
		{
			$msg_error = "Please check your inputs!";
		}
		if($_GET['error'] == 'email_not_confirmed')
		{
			$msg_error = "You have to confirm your email first!";
		}
		if($_GET['error'] == 'email_or_psd_inc')
		{
			$msg_error = "Incorrect email or password!";
		}
		if($_GET['error'] == 'email_already_verified')
		{
			$msg_error = "Your email was already verified!";
		}
		if($_GET['error'] == 'fail')
		{
			$msg_error = "We can not verify your email! Please try again!";
		}
	}
	if(isset($_GET['success']))
	{
		if($_GET['success'] == "email_verified")
		{
			$msg_success = "Your email has been verified! Please log in!";
		}
	}

?>

<!DOCTYPE html>
<html>
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
					}
				?>

				<div class="allignment">
					<img src="./../images/user2.png" alt="user">
				</div>
				<br>
				<form action="../index.php" method="POST">
					<div class="allignment2">
						<input id="email_id" type="email" name="email" placeholder="Your email.." required="required">
					</div>
					<div class="allignment2">
						<input id="password_id" type="password" name="password" placeholder="Your password.." required="required">
					</div>
					<div class="allignment">
						<input type="submit" id="button_login" name="login" value="LOGIN"/>
					</div>
				</form>
				<div id="message-allign">
					<p class="message">Don't have an account yet?<a href="./register.php"> Create one!</a></p>
				</div>
				<br>
				<br>
			</div>
		</div>
 
	</div>
	
	<script>
		
	</script>
	
</body>
</html>

