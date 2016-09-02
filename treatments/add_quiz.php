<?php   
require('../core/boot.php'); 

if (isset($_POST) && (!empty($_POST['quiz_title'])) && (!empty($_POST['category'])) && (!empty($_POST['type'])) && (!empty($_POST['level'])) && (!empty($_SESSION['login'])) && (!empty($_POST['timer']) )){
	extract($_POST);
	
	$login = $_SESSION['login'];
	$quiz_title = mysql_real_escape_string($quiz_title);
	
	$sql="INSERT INTO quizzes (titleQz, nomTh, typeQz, levelQz, login, timerQz)
	VALUES
	('".$quiz_title."','".$category."','".$type."','".$level."','".$login."','".$time."')" or exit(mysql_error());
	$req = 	mysql_query($sql) or die ('ERREUR '.mysql_error());
	$_SESSION['quiz_id'] = mysql_insert_id();

	header('Location: ../pages/create_quiz_2.php');
}
?>