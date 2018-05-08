<?php
	include("./actions/db_connection.php");
	if(isset($_POST['login']))
	{
		$email            = $con->real_escape_string($_POST['email']);
		$password         = $con->real_escape_string($_POST['password']);
		
		if($email == "" || $password == "")
		{
			$msg = "Please check your inputs!";
		}
		else
		{
			$sql = $con->query("SELECT email , password , isEmailConfirmed FROM users WHERE email='$email'");
			if($sql->num_rows > 0)
			{
				$data = $sql->fetch_array();
				if(password_verify($password, $data['password']))
				{
					if($data['isEmailConfirmed'] == 0)
					{
						$msg = "You have to confirm your email first!";
					}
					else
					{
						$msg_success = "You have been logged in! You will be redirected in 1 sec!";
						$sql = $con->query("SELECT token FROM users WHERE email='$email'");
						$row = $sql->fetch_assoc();
						$token = $row['token'];
						header("refresh:1;url=index.php?id='$token'");
					}
				}
				else
				{
					$msg = "Incorrect email or password!";
				}
			}
			else
			{
				$msg = "Incorrect email or password!";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
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
				<form action="login.php" method="POST">
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

