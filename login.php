<!DOCTYPE html>
<html>
<head>
	<title></title><!--The login page -->
</head>
<link rel="stylesheet" href="login.css">
<body>
	<div class="box">
		<h1>Log In</h1>
			<form action="store.php" method="post">
				<input class = "text-box"type="text" name="name" placeholder="Username/email">
				<input class = "text-box"type="password" name="pass" placeholder="password">
				<button class="btn-login"type="submit" name="login">Log In</button>
				<a href="signup.php">REGISTER</a>
			</form>
	</div>
<!-- -->
</body>
</html>