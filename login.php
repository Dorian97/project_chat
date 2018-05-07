<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<title>Project</title>
		<link rel="stylesheet" type="text/css" href="style/style.css"/>
</head>
<body>
	<div id="container">

		<div class="form">

			<div class="allignment">
				<img src="./images/user2.png" alt="user">
			</div>
			<br>
			<form action="actions/insert.php" method="POST">
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
	
	<script>
		
	</script>
	
</body>
</html>

