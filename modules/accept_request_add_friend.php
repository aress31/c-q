<?php 
	require('../core/boot.php');
	
	function accept_invitation(){
		mysql_query("
		UPDATE as_friend
		SET friend_acc = 'y'
		WHERE login='{$_SESSION['login']}' AND login_friend='{$_GET['login_friend']}'") or die(mysql_error());
		
		mysql_query("
		INSERT INTO as_friend(login,login_friend,friend_acc)
		VALUES ('{$_GET['login_friend']}','{$_SESSION['login']}','y') ") or die(mysql_error());
		
	}
	
	accept_invitation();
	header('Location:../pages/friends.php');
	
?>