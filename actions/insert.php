<?php
	
	include("../actions/db_connection.php");

	$first_name       = $_POST['first_name'];
	$last_name        = $_POST['last_name'];
	$email            = $_POST['email'];
	$username         = $_POST['username'];
	$password         = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];

	if(isset($_POST['signup']) && !empty($first_name) && !empty($last_name) && !empty($email) && !empty($email) && !empty($username) && !empty($password) && !empty($confirm_password))
	{
		if($password == $confirm_password)
		{
			$sql  = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `username`, `password`) VALUES ('$first_name','$last_name','$email','$username','$password')";

			if(!mysqli_query($con,$sql))
			{
				echo "Not Inserted";
			}
			else
			{
				echo "Inserted";
			}

			header("location: ../index.php");
			exit;
		}
		else
		{
			echo "Passwords do not match each other!";
		}
	}else
	{
		echo "Please complete all the data!";
	}

	if(isset($_POST['login']))
	{
		echo "test";
	}
	
?>
	