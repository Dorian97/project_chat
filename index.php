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
			</br>
			<form action="actions/insert.php" method="POST">
				<div id="ifYes" style="display:none">
					<div class="allignment2">
						<input id="input_not_displayed1" type="text" name="first_name" placeholder="Your First Name.." required="required">
					</div>
					<div class="allignment2">
						<input id="input_not_displayed2" type="text" name="last_name" placeholder="Your Last Name.." required="required">
					</div>
					<div class="allignment2">
						<input id="input_not_displayed3" type="email" name="email" placeholder="Your email.." required="required">
					</div>
				</div>
				<div class="allignment2">
					<input type="text" name="username" placeholder="Your username.." required="required">
				</div>
				<div class="allignment2">
					<input type="password" name="password" placeholder="Your password.." required="required">
				</div>
				<div id="confirm_password" class="allignment2" style="display:none">
					<input id="input_not_displayed4" type="password" name="confirm_password" placeholder="Confirm your password.." required="required">
				</div>
				<div class="allignment">
					<input type="submit" id="button_login" name="login" value="LOGIN"/>
				</div>
			</form>
			<div id="message-allign">
				<p class="message">Don't have an account yet?<a href="#" onclick="onCLICK()"> Create one!</a></p>
			</div>
			</br>
			</br>
		</div>

	</div>
</body>
</html>

<?php
	echo "test"; 
	echo "test2";
?>

<script type="text/javascript">

	var elements_not_displayed = document.getElementById('ifYes');
	
	function onCLICK(){
		elements_not_displayed.style.display                      = 'block';
		document.getElementById('confirm_password').style.display = 'block';
		document.getElementById('button_login').value             = 'CREATE ACCOUNT';
		document.getElementById('button_login').name              = 'signup';
		document.getElementById('message-allign').style.display   = 'none';
		document.getElementById("input_not_displayed1").required  = true;
		document.getElementById("input_not_displayed2").required  = true;
		document.getElementById("input_not_displayed3").required  = true;
		document.getElementById("input_not_displayed4").required  = true;
	}

	if(elements_not_displayed.style.display == 'none')
	{
		document.getElementById("input_not_displayed1").required  = false;
		document.getElementById("input_not_displayed2").required  = false;
		document.getElementById("input_not_displayed3").required  = false;
		document.getElementById("input_not_displayed4").required  = false;
	}
	
</script>