<?php
	
	include("./actions/db_connection.php");
	
	function redirect()
	{
		header('Location:login.php');
		exit();
	}
	
	if(!isset($_GET['email']) || !isset($_GET['token']))
	{
		redirect();
	}
	else
	{
		$email = $con->real_escape_string($_GET['email']);
		$token = $con->real_escape_string($_GET['token']);
		
		$sql   = $con->query("SELECT * FROM users WHERE email='$email' AND token='$token' AND isEmailConfirmed = 0");
		if($sql->num_rows > 0)
		{
			$con->query("UPDATE users SET isEmailConfirmed = 1 , token = '' WHERE email = '$email'");
			echo "Your email has been verified! Please log in!";
			redirect();
		}
		else
		{
			redirect();
		}
	}
?>