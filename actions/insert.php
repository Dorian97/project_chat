<?php
	
	include("../actions/db_connection.php");

	$first_name       = $_POST['first_name'];
	$last_name        = $_POST['last_name'];
	$email            = $_POST['email'];
	$password         = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	
	$msg = "";

	if( isset($_POST['register']) )
	{
		if($password == $confirm_password)
		{
			$sql  = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`) VALUES ('$first_name','$last_name','$email','$password')";
			mysqli_query($con,$sql);
			header("location: ../login.php");
			exit;
		}
		else
		{
			$msg = "Password and Confirmed Password are not the same...";
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
	