<?php
	require('../core/boot.php'); 

	if (isset($_POST) && (!empty($_POST['choice'])) && !(empty($_POST['applicant_login']))) {
		
		$choice = $_POST['choice'];
		$applicant_login = $_POST['applicant_login'];
		
		if ($choice == "accept") {
			$sql = ("UPDATE Users SET status = 'admin', promo_acc = 'yes' WHERE (login = '".$applicant_login."' AND loginPro = '".$_SESSION['login']."')  ");
			$req = 	mysql_query($sql) or die ('ERREUR '.mysql_error()); 
		}
		
		else {
			$sql = ("UPDATE Users SET promo_acc = NULL, loginPro = NULL WHERE (login = '".$applicant_login."' AND loginPro = '".$_SESSION['login']."')  ");
			$req = 	mysql_query($sql) or die ('ERREUR '.mysql_error()); 
		}
		
		header('Location: ../pages/admin_homepage.php'); 
		
	}
	
	else echo "error";