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
	
				<div class="allignment">
					<img src="./images/user2.png" alt="user">
				</div>
				<br>
				<form action="actions/insert.php" method="POST">
					
					<div class="allignment2">
						<input id="first_name_id" type="text" name="first_name" placeholder="Your First Name.." required="required">
					</div>
					<div class="allignment2">
						<input id="last_name_id" type="text" name="last_name" placeholder="Your Last Name.." required="required">
					</div>
					<div class="allignment2">
						<input id="email_id" type="email" name="email" placeholder="Your email.." required="required">
					</div>
					<div class="allignment2">
						<input id="password_id" type="password" name="password" placeholder="Your password.." required="required">
					</div>
					<div id="confirm_password" class="allignment2">
						<input id="confirm_password_id" type="password" name="confirm_password" placeholder="Confirm your password.." required="required">
					</div>
					<div class="allignment">
						<input type="submit" id="button_login" name="login" value="CREATE ACCOUNT"/>
					</div>
					
				</form>
				<br>
				<br>
			</div>
		</div>
	</div>
	
	<script>
		
	</script>
	
</body>
</html>

