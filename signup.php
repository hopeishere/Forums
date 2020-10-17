<!DOCTYPE html>
<html>
<head>
	<title></title><!-- signup page-->
</head>
<link rel="stylesheet" href="login.css">
<body>
	<div class="box_signup">
		<h1>Sign Up</h1>
			<form action="signup_store.php" method="post">
				<input class = "text-box_signup"type="text" name="usr_name" placeholder="Username">
				<input class = "text-box_signup"type="text" name="name" placeholder="email">
				<input class = "text-box_signup"type="password" name="pass" placeholder="password">
				<input class = "text-box_signup"type="password" name="repass" placeholder="re-password">
				<button class="btn-login"type="submit" name="signup">sign up</button>
				<?php
			if(isset($_GET['error'])){
				if ($_GET['error'] == "emptyfields") {
					echo '<p style = "Color : red;">there are blank fields</p>';
				}
				else if ($_GET['error'] == "invalidnameusr_name") {
					echo '<p style = "Color : red;text-align = center;">invalid username and email </p>';
				}else if ($_GET['error'] == "invalidname") {
					echo '<p style = "Color : red;text-align = center;">invalid username</p>';
				}else if ($_GET['error'] == "invalidusr_name") {
					echo '<p style = "Color : red;text-align = center;">invalid email </p>';
				}else if ($_GET['error'] == "passwordcheck") {
					echo '<p style = "Color : red;text-align = center;">invalid password </p>';
				}else if ($_GET['error'] == "usertaken") {
					echo '<p style = "Color : red;text-align = center;">username taken </p>';
				}
			}else if(isset($_GET['signup']) == "success"){
					echo '<p style = "Color : green; text-align = center;">sign up success</p>';
			}
		?>
		
				<a href="login.php"> Already have a account ?</a>
			</form>
	</div>

</body>
</html>