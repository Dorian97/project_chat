<?php
	
	include("./actions/db_connection.php");
	use PHPMailer\PHPMailer\PHPMailer;
	include_once "PHPMailer/PHPMailer.php";


	$msg = "";

	if( isset($_POST['register']) )
	{
		
		$first_name       = $con->real_escape_string($_POST['first_name']);
		$last_name        = $con->real_escape_string($_POST['last_name']);
		$email            = $con->real_escape_string($_POST['email']);
		$password         = $con->real_escape_string($_POST['password']);
		$confirm_password = $con->real_escape_string($_POST['confirm_password']);
		
		if($password == $confirm_password)
		{
			$sql1 = $con->query("SELECT * FROM users WHERE email='".$email."'");
			if($sql1->num_rows > 0)
			{
				$msg = "There is an user already registered with this email...";
			}
			else
			{
				$token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789!$/()*';
				$token = str_shuffle($token);
				$token = substr($token, 0, 10);
				
				$hashedPassword = password_hash($password, PASSWORD_BCRYPT); 
				
				$sql  = "INSERT INTO `users`(`firstname` , `lastname` , `email` , `password` , `isEmailConfirmed` , `token`) VALUES ('$first_name' , '$last_name' , '$email' ,  '$hashedPassword' , '0' , '$token')";
				$con->query($sql);
				$mail = new PHPMailer();
				$mail->setFrom('dorianivan.id@gmail.com');
				$mail->addAddress($email, $first_name." ".$last_name);
				$mail->Subject = "Please verify your email";
				$mail->isHTML(true);
				$mail->Body = "
					Please click on the link below to verify your email<br><br>
					<a href='http://localhost/project/confirm.php?email=$email&token=$token'>Click here!</a>
				";
				
				if($mail->send())
				{
					$msg_success = "You have been registered! Please verify your email!";
				}
				
				else
				
				{
					$msg = "Something wrong happened! Please try again!";
				}
								
				
			} 
			
				
		}
		else
		{
			$msg = "Password and Confirmed Password are not the same...";
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
		<meta charset="UTF-8">
		<title>Project</title>
		<link rel="stylesheet" type="text/css" href="style/style.css"/>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="form">
				<?php
					if(!empty($msg))
					{
				?>
					  <div class='alert'>
					  <span class='closebtn' onclick="this.parentElement.style.display='none';">&times;</span>&nbsp;&nbsp;
					  <?=$msg;?>
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
					<img src="./images/user2.png" alt="user">
				</div>
				<br>
				<form action="register.php" method="POST">
					
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

