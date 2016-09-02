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
		<link rel="stylesheet" type="text/css" href="../design/css/forgot_password.css" media="screen" />
	</head>
	
	<body>
		<section id = "wrap">
			
			<?php
				include('../modules/header.php');
			?>
			
			<hr>
			
			<article>
				<h2>STEP 1/3</h2>
				<br>
				<h1>Redifine your Password</h1>
				
				<div class = "clear"></div>
				<p>
					To redefine your password, enter your email and and the characters that appear in 
					<br> the image below.
				</p> 
			</article>
			
			<form method="POST" action="./forgot_password_step2.php" id = "step1">
				<label for email> Email : </label>
				<input type = "text" name = "email" placeholder = "Email">
				<em>Exemple : xyz@example.com</em>
				
				<label for captcha> What's this number ? </label>
				<br>
				<img src="../design/captcha.php"><br />
				<input type="text" name="captcha"><br />
				
				<input type = "submit" name = "submit" value = "Submit">
			</form>
			
			<img src = "../design/images/forgot_password_logo.jpg" alt = "forgot_password_logo" id = "forgot_password_logo">
			
			<?php
				include('../modules/footer.php');
			?> 
			
		</section>
	</body>

</html>
