<?php   
	require('../core/includes/functions.php'); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Courses & Quizzes</title>
		<link rel="shortcut icon" href="../design/images/logoicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="../design/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../design/css/signIn.css" media="screen" />
	</head>
	
	<body>
		<section id = "wrap">
			
			<?php
				include('../modules/header.php');
			?>
			
			<hr>
			
			<section class = "container">
				<section class = "signIn">
					<h1> Sign In </h1>
					<br>
					<form id = "signIn" method="POST" action="../treatments/authentification.php">
						<input type = "text" name = "login" placeholder = "Login">
						<br>
						
						<input type = "password" name = "password" placeholder = "Password"> 
						<label for password><a href = "../pages/forgot_password_step1.php" id = "link"> Forgot Password ? </a></label>
						
						<br>
						<input type = "submit" name = "submit" value = "Sign In">
					</form>
					<br>
					<p> Don't have an account ? <a href = "../pages/signUp.php" id = "link"> Sign Up now </a> </p>
				</section>
				
				<aside class = "signIn">
					<img src = "../design/images/signIn_aside.png" alt = "signIn_aside" id = "signIn_aside">
				</aside>
			</section>

			<img src = "../design/images/signIn.jpg" alt = "signIn_logo" id = "signIn_logo">	
			
			<?php
				include('../modules/footer.php');
			?> 
			
		</section>
	</body>

</html>
