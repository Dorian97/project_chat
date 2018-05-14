<?php

	$servername    = 'localhost';
	$username      = 'root';
	$password      = '';
	$database_name = 'chat_db';
	$con = new mysqli($servername, $username, $password, $database_name);	
	
	var_dump($con);die;
	if($con)
	{
		echo "da";
	}else
	{
		echo "nu";
	}
	
?>