<?php   
	require('../core/boot.php'); 

    /*On n'effectue les traitement qu'à la condition que les informations aient été effectivement postées*/
    if (isset($_POST) && (!empty($_POST['login'])) && (!empty($_POST['firstname'])) && (!empty($_POST['lastname'])) && (!empty($_POST['password'])) && (!empty($_POST['confirmPassword']))
		 && (!empty($_POST['email'])) && (!empty($_POST['securityAnswer']))) {
		 
		extract($_POST);
		
		$sql = ("SELECT login FROM Users WHERE login = '".$login."'");
		$req = 	mysql_query($sql) or die ('ERREUR '.mysql_error()); 
	
		if (mysql_num_rows($req) > 0) {
			header('Location: ../pages/error_pages/signUp_login_error.php');
		}
		
		$sql = ("SELECT email FROM Profils WHERE email = '".$email."'");
		$req = 	mysql_query($sql) or die ('ERREUR '.mysql_error()); 
		
		if (mysql_num_rows($req) > 0) {
			header('Location: ../pages/error_pages/signUp_email_error.php');
		}
		
		else {
		
			if ($password != $confirmPassword  || strlen($password) < 6) {
				header('Location: ../pages/error_pages/signUp_password_error.php');
			}

			else {
				//For the Profils table
				$sql = ("INSERT INTO Profils (lastname, firstname, birthday, phone, email,  securityQuestion, securityAnswer)
				VALUES ('".$lastname."','" .$firstname."','".$birthdate."','" .$phone."','" .$email."','".$securityQuestion."','" .$securityAnswer."') ");
				$req = mysql_query($sql) or die ('ERREUR '.mysql_error());
				
				//We are getting the IdP of the insertion above
				$sql = ("SELECT idP FROM Profils WHERE email='".$email."' ");
				$req = mysql_query($sql) or die ('ERREUR '.mysql_error());
				$data = mysql_fetch_assoc($req);
				
				//Cryptage MD5
				$crypted = md5($password); 
				
				//For the Users table
				$sql = ("INSERT INTO Users (login, password, status, idP)
				VALUES ('".$login."','" .$crypted."', 'user', '".$data['idP']."') ");
				$req = mysql_query($sql) or die ('ERREUR '.mysql_error());
				
				//Envoie d'un Mail contenant les identifiants
				$to = $email;
				
				$subject = '[Courses&Quizzes] - Inscription Confirmation';
				
				$message = '<html>';
				$message .= '<head>
								<title>[C&Q] WELCOLM</title>
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
									Your new inscription on [C&Q]Courses&Quizzes was registrated, your login, password are 
									<strong>';
				$message .= 		"$login ";
				$message .= 		"$password";
				$message .= '		</strong>
								</p>
								<p style="font-size: medium;">
									Keep them.
								</p>
							</body>
							</html>';

				$headers = 'MIME-Version: 1.0'."\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";		
				
				ini_set( 'SMTP', 'smtp.sfr.fr' ); 
				mail($to, $subject, $message, $headers);
			
				
				header('Location: ../pages/signIn.php');
			}
		}
	}
