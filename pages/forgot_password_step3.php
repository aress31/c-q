<?php   
	require('../core/boot.php'); 
?>
<!-- Revoir le rechargement de la page -->
<!DOCTYPE html>
<html>
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
				<h2>STEP 3/3</h2>
				<br>
				<h1>Redifine your Password</h1>
				
				<div class = "clear"></div>
				
			<?php			
				if (isset($_POST) && (!empty($_POST['security_answer'])) && (!empty($_POST['email']))) {
					
					extract($_POST); 
					
					$sql = ('SELECT securityAnswer FROM Profils WHERE email="'.$email.'"') or die(mysql_error());
					$req = mysql_query($sql) or die(mysql_error()) ;
					$data = mysql_fetch_assoc($req);
					
					if ($data['securityAnswer'] == $security_answer) {
						$password = random_password();
						// On récupère l'idP
						$sql = ('SELECT idP FROM Profils WHERE email = "'.$email.'"');
						$req = mysql_query($sql) or die(mysql_error()) ;
						$idP = mysql_result($req, 0);
						
						// On récupére le Nom, Prénom
						$sql = ('SELECT firstname, lastname FROM Profils WHERE idP = "'.$idP.'"') or die(mysql_error());
						$req = mysql_query($sql) or die(mysql_error()) ;
						$data = mysql_fetch_assoc($req);
						$firstname = $data['firstname'];
						$lastname = $data['lastname'];
						
						//Cryptage MD5
						$crypted = md5($password); 
						
						//Modifier la BDD POUR IDP PROFILS
						$sql = ('UPDATE Users SET password = "'.$crypted.'" WHERE idP = "'.$idP.'"') or die(mysql_error());
						$req = mysql_query($sql) or die(mysql_error()) ;
										
						// On envoie le mail
						$to = $email;
						
						$subject = '[Courses&Quizzes] - Password Redefinition';
						
						$message = '<html>';
						$message .= '<head>
										<title>[C&Q] Password Redefinition</title>
									</head>';
						$message .= '<body>
										<h1 style="color: #B52025; text-align: center; font-size: large; weight-seize: bolder; text-decoration: underline;"> 
											Courses & Quizzes' ;
						$message .= '	</h1>
										<p style="font-size: medium; text-decoration: underline;">
											Dear ';
						$message .= 		"$firstname ";
						$message .= 		"$lastname.";
						$message .= '	</p>
										<p style="font-size: medium;">
											This message was sent after a renewal application password, your new password is 
											<strong>';
						$message .= 		"$password.";
						$message .= '		</strong>
										</p>
										<p style="font-size: medium;">
											Don\'t forget to edit it in your profile.
										</p>
									</body>
									</html>';

						$headers = 'MIME-Version: 1.0'."\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";		
						
						ini_set( 'SMTP', 'smtp.sfr.fr' ); 
						mail($to, $subject, $message, $headers);
			?>
				<p>
					A mail was sent to <strong><?php echo $email; ?></strong> with a new random password. You will be able to edit it 
					<br> in your profil panel.
				</p> 
				<div id = "center">
					<a href = "../pages/index.php">
						<img src = "../design/images/house.jpg" alt = "house"> 
					</a> <em class = "home">Go to Home</em>
				</div>
			</article>
					
			<?php

					}
					
					else {
			?>
				<p class = "error">
					Your answer <strong><?php echo $security_answer; ?></strong> was wrong. 
				</p> 
				<a href="#null" onclick="javascript:history.go(-2);">
					<img src = "../design/images/previous_red.gif" alt = "previous_red"> 
				</a> <em class = "previous">To Step1</em>
			</article>
			
			<?php
					}
				}
				
				else {
			?>
				<p class = "error">
					Please, fill all the requiered fields.
				</p> 
				
				<a href="#null" onclick="javascript:history.go(-2);">
					<img src = "../design/images/previous_red.gif" alt = "previous_red"> 
				</a> <em class = "previous">To Step 1</em>
			</article>
			<?php	
				}
			?>
										
			<img src = "../design/images/forgot_password_logo.jpg" alt = "forgot_password_logo" id = "forgot_password_logo">
								
			<?php
				include('../modules/footer.php');
			?> 	
			</section>	
	</body>

</html>