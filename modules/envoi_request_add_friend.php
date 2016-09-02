<?php 
	require('../core/boot.php');
	
	function envoi_invitation(){
		mysql_query("
		INSERT INTO as_friend(login,login_friend,friend_acc)
		VALUES ('{$_GET['login_friend']}','{$_SESSION['login']}','n') ") or die(mysql_error());
		
	}
	
	envoi_invitation();
	header('Location:../pages/friends.php');
	
?>