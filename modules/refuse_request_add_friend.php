<?php 
	require('../core/boot.php');
	
	function refuse_invitation(){
		$requete = mysql_query("
		DELETE FROM as_friend
		WHERE login='{$_SESSION['login']}' AND login_friend='{$_GET['login_friend']}'") or die(mysql_error());
	}
	
	refuse_invitation();
	header('Location:friends.php');
	
?>