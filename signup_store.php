<?php 
if (isset($_POST['signup'])) { //checking the post method
	require 'dbh.php';
	$username = $_POST['usr_name'];
	$email = $_POST['name'];
	$pass = $_POST['pass'];
	$repass = $_POST['repass'];

	if(empty($username)||empty($email)||empty($pass)||empty($repass)){//checking empty field
		header("Location: signup.php?error=emptyfields&usr_name=".$username."&name=".$email);
		exit();
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)&&!preg_match("/^[a-zA-Z0-9]*$/", $username)) {//checking invalid username and email
		header("Location: signup.php?error=invalidnameusr_name");
		exit();
	}

	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {//checking invalid email
		header("Location: signup.php?error=invalidname&usr_name=".$username);
		exit();
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {//checking invalid username
		header("Location: signup.php?error=invalidusr_name&name=".$email);
		exit();
	}
	elseif ($pass !== $repass) {//checking the password and the repeat password
		header("Location: signup.php?error=passwordcheck&usr_name=".$username."&name=".$email);
		exit();
	}else{
		$sql = "SELECT user_name from user_data WHERE user_name=?";//include the database
		$stmt = mysqli_stmt_init($conn);							
		if(!mysqli_stmt_prepare($stmt,$sql)){						// Checking the connection and the database
			header("Location: signup.php?error=sqlerror");
		exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"s",$username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$result_check = mysqli_stmt_num_rows($stmt);
			if($result_check>0){
				header("Location: signup.php?error=usertaken&name=".$email);
				exit();
			}else{
				$stmt = mysqli_stmt_init($conn);					
				$sql = "INSERT INTO user_data(user_name,user_email,user_pass) VALUES (?,?,?) ";// insert some data into the database
				if(!mysqli_stmt_prepare($stmt,$sql)){
					header("Location: signup.php?error=sqlerror");
					exit();
				}
				else{
					$hashpassword = password_hash($pass, PASSWORD_DEFAULT); //hash some password for security reasons
					mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashpassword); // get the username, email and the password
					mysqli_stmt_execute($stmt);
					header("Location: login.php?signup=success"); //  give a sign to the user that their data has been stored to the database
					
					exit();
				}
		}
	}


}
mysqli_stmt_close($stmt);
mysql_close($conn);
}
else{
	header("Location: signup.php");// if the post method does not work they will go back to the sign up page
	exit();
}