<?php
	session_start();
?>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="http://localhost/project/style/header.style.css"/>
</head>
<header>
	<div class="container">
		<img src="http://localhost/project/images/chat_bubble_messages-512.png" style="width: 60px; height: 50px;" alt="logo" class="logo">
		<nav>
			<ul>	
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="#">Users Existing On the Platform</a>
				</li>
				<li>
					<a href="#">Active Chats</a>
				</li>
				<li>
					<a href="#">General Settings</a>
				</li>
				<li>
					<?php
						if(isset($_SESSION['user_id']))
						{
							echo '<form action="./functionality/logout.functionality.php" method="POST" accept-charset="utf-8">
									<button class="button button-logout" type="submit" name="submit">Logout</button>
								  </form>';
						}
						else
						{
							header("Location: ./layout/login.php");
							exit();
						}
					?>
				</li>
			</ul>
		</nav>
	</div>
</header>