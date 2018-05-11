<?php
	
	include("../actions/db_connection.php");
	use PHPMailer\PHPMailer\PHPMailer;
	include_once "./../PHPMailer/PHPMailer.php";

	if( isset($_POST['register']) )
	{
		
		$first_name       = $con->real_escape_string($_POST['first_name']);
		$last_name        = $con->real_escape_string($_POST['last_name']);
		$email            = $con->real_escape_string($_POST['email']);
		$password         = $con->real_escape_string($_POST['password']);
		$confirm_password = $con->real_escape_string($_POST['confirm_password']);
		
		if(!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password) && !empty($confirm_password))
		{
			if($password == $confirm_password)
			{
				$sql1 = $con->query("SELECT * FROM users WHERE email='".$email."'");
				if($sql1->num_rows > 0)
				{
					header("Location: ../layout/register.php?error=existing_user");
					exit();
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
						header("Location: ../layout/register.php?success=email_sent");
						exit();
					}
					
					else
					
					{
						header("Location: ../layout/register.php?error=sth_went_wrong");
						exit();
					}
									
					
				} 
				
					
			}
			else
			{
				header("Location: ../layout/register.php?error=psd_not_eq");
				exit();
			}
		}
		else
		{
			header("Location: ../layout/register.php?error=sth_went_wrong");
			exit();
		}
	}
	
?>
