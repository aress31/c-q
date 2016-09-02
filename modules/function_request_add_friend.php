<?php

	function envoi_invitation(){
		$requete = mysql_query("
		INSERT INTO as_friend(login,login_friend,friend_acc)
		VALUES ('{$_SESSION['login']}','$login_friend','n') ") or die(mysql_error());
	}

?>