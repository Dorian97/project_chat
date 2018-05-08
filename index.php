<?php
	
	include("./actions/db_connection.php");
	
	$token = $_GET['id'];
	$token = substr($token, 1, -1);
	
	if(!empty($token))
	{
		$sql = $con->query("SELECT firstname , lastname , email , isEmailConfirmed , register_date FROM users WHERE token='$token'");
		if($sql->num_rows > 0)
		{
			$row = $sql->fetch_assoc();
			if($row['isEmailConfirmed'] == '1')
			{
				session_start();
				$_SESSION['name'] = $row['firstname']." ".$row['lastname'];
				$username = $_SESSION['name'];
				echo $username;
			}
			else
			{
				$msg = "Your email is not confirmed! You will be redirected to login page!";
				echo $msg;
				header( "refresh:2;url=login.php");
			}
		}
		else
		{
			$msg = "There is a problem with you account... Please contact our technical team...";
			echo $msg;
			header( "Location:login.php");
		}
	}
	else
	{
		$msg = "There is a problem with you account!Please contact our technical team!";
		echo $msg;
		header( "Location:login.php");
	}
?>