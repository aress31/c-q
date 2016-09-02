<?php 
	require('../core/boot.php');
	
	$status = $_SESSION['status'];
	$pwd=$_GET['pwd'];
	$email=$_GET['email'];
	$firstname=$_GET['firstname'];
	$lastname=$_GET['lastname'];
	$birthday=$_GET['birthday'];
	$phone_number=$_GET['phone_number'];
	$address=$_GET['address'];
	$security_question=$_GET['security_question'];
	$security_answer=$_GET['security_answer'];
	
	function save_all(){
		$requete=("
		UPDATE users
		SET password = '{$_GET['pwd']}'
		WHERE login='{$_SESSION['login']}'");
		
		$requete1=("
		UPDATE profils
		SET email = '{$_GET['email']}',firstname = '{$_GET['firstname']}',lastname = '{$_GET['lastname']}',birthday = '{$_GET['birthday']}',phone = '{$_GET['phone_number']}',address = '{$_GET['address']}',securityQuestion = '{$_GET['security_question']}',securityAnswer = '{$_GET['security_answer']}'
		WHERE profils.idP = (SELECT users.idP 
							 FROM users
							 WHERE login='{$_SESSION['login']}')");
							 
		
		mysql_query($requete)or die(mysql_error());
		mysql_query($requete1) or die(mysql_error());
		
	}

	save_all();
	
	if(	$status == "admin")
		header('Location:../pages/admin_homepage.php');
	
	else 
		header('Location:../pages/user_homepage.php');
?>