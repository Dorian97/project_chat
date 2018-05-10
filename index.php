<?php
	
	include("./actions/db_connection.php");
	if(isset($_POST['login']))
	{
		$email            = $con->real_escape_string($_POST['email']);
		$password         = $con->real_escape_string($_POST['password']);
		
		if($email == "" || $password == "")
		{
			header("Location: ./layout/login.php?error=check_inputs");
			exit();
// 			$msg_error = "Please check your inputs!";
		}
		else
		{
			$sql = $con->query("SELECT id, firstname, lastname, email , password , isEmailConfirmed ,isAdmin FROM users WHERE email='$email'");
			if($sql->num_rows > 0)
			{
				$data = $sql->fetch_array();
				if(password_verify($password, $data['password']))
				{
					if($data['isEmailConfirmed'] == 0)
					{
						header("Location: ./layout/login.php?error=email_not_confirmed");
						exit();
// 						$msg_error = "You have to confirm your email first!";
					}
					else
					{	
						echo "Login with success!";
						echo("<br>");
						session_start();
						$_SESSION['name'] = $data['firstname']." ".$data['lastname'];
						$_SESSION['id']   = $data['id'];
					}
				}
				else
				{
					header("Location: ./layout/login.php?error=email_or_psd_inc");
					exit();
// 					$msg_error = "Incorrect email or password!";
				}
			}
			else
			{
				header("Location: ./layout/login.php?error=email_or_psd_inc");
				exit();
// 				$msg_error = "Incorrect email or password!";
			}
		}
	}
	if(isset($_SESSION['name']))
	{
		echo $_SESSION['name'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Chat with fun! :)</title>
	<link rel="stylesheet" type="text/css" href="style/index.style.css"/>
</head>
<body>
	<header>
			<nav>
				<div class="main-wrapper">
					<ul>	
						<li>
							<a href="index.php">Home</a>
						</li>
					</ul>
				</div>
			</nav>
	</header>
</body>
</html>