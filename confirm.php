<?php
	
	include("./actions/db_connection.php");
	
	if(!isset($_GET['email']) || !isset($_GET['token']))
	{
		header('Location:login.php');
		exit();
	}
	else
	{
		$email = $con->real_escape_string($_GET['email']);
		$token = $con->real_escape_string($_GET['token']);
		
		$sql   = $con->query("SELECT * FROM users WHERE email='$email' AND token='$token' AND isEmailConfirmed = 0");
		$data  = $sql->fetch_array();
		if($sql->num_rows > 0)
		{
			if($data['isEmailConfirmed'] == "1")
			{
				header("Location: ./layout/login.php?error=email_already_verified");
				exit();
			}
			else
			{
				if($data['isEmailConfirmed'] == 0 && !empty($data['token']))
				{
					$con->query("UPDATE users SET isEmailConfirmed = 1, token = '' WHERE email = '$email'");
					header("Location: ./layout/login.php?success=email_verified");
					exit();
				}
				else
				{
					header("Location: ./layout/login.php?error=fail");
					exit();
				}
			}
		}
		else
		{
			header("Location: ./layout/login.php?error=fail");
			exit();
		}
		
		
	}
?>