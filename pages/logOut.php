    <?php

	require('../core/boot.php'); 

    session_start();
	
	mysql_query("
		UPDATE users
		SET online_offline = '0'
		WHERE login='{$_SESSION['login']}'") or die(mysql_error());
	
    session_destroy();
	header('Location: ../pages/index.php');

    ?>