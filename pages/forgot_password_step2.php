<?php   
	require('../core/boot.php'); 
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
				<h2>STEP 2/3</h2>
				<br>
				<h1>Redifine your Password</h1>
				
				<div class = "clear"></div>
				
			<?php			
				if (isset($_POST) && (!empty($_POST['email'])) && (!empty($_POST['captcha']))) {
					
					extract($_POST); 
					
					if ($captcha == $_SESSION['captcha']) {
					
						$sql = ('SELECT securityQuestion FROM Profils WHERE email="'.$email.'"') or die(mysql_error());
						$req = mysql_query($sql) or die(mysql_error()) ;
						
						if (mysql_num_rows($req) > 0) {
							$data = mysql_fetch_assoc($req);
			?>
				<p>
					To redefine your password, you have now to answer your security question 
					<br> below.
				</p> 
			</article>
					
			<form method="POST" action="./forgot_password_step3.php" id = "step2">
				
				<img src = "../design/images/security_logo.gif" alt = "security_logo" id = "security_logo">
				<label> Security Answer : <?php echo $data['securityQuestion']; ?></label>
				<input type = "text" name = "security_answer" placeholder = "Your Answer">
				<!-- Passage de l'email au formulaire suivant -->
				<input type = "hidden" name = "email" value = "<?php echo $email; ?>">
				<br>
				<input type = "submit" name = "submit" value = "Submit">
			</form>
			
			<?php
						}
					
						else {
			?>
				<p class = "error">
					This email adress does not exists : <strong><?php echo $email; ?></strong>.
				</p> 
				<a href="#null" onclick="javascript:history.back();">
					<img src = "../design/images/previous_red.gif" alt = "previous_red"> 
				</a> <em class = "previous">Previous Page</em>
			</article>
				
				
			<?php
						}
					}
					
					else {
			?>
				<p class = "error">
					The captcha code entered <strong><?php  echo $captcha; ?></strong> does not match with the captcha 
					code requiered <strong><?php echo $_SESSION['captcha']; ?></strong>.
				</p> 
				
				<a href="#null" onclick="javascript:history.back();">
					<img src = "../design/images/previous_red.gif" alt = "previous_red"> 
				</a><em class = "previous">Previous Page</em>
			</article>
			<?php
					}
				}
				
				else {
			?>
				<p class = "error">
					Please, fill all the requiered fields.
				</p> 
				
				<a href = "../pages/forgot_password_step1.php">
					<img src = "../design/images/previous_red.gif" alt = "previous_red"> 
				</a> <em class = "previous">Previous Page</em>
			</article>
			<?php	
				}
			?>
		
		
			<img src = "../design/images/forgot_password_logo.jpg" alt = "forgot_password_logo" id = "forgot_password_logo">
			
			
		
<?php
				include('../modules/footer.php');
			?> 	</section>	
	</body>

</html>