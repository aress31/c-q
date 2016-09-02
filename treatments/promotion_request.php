 <?php
	require('../core/boot.php'); 
?>

 <html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Courses & Quizzes</title>
		
		<link rel="shortcut icon" href="../design/images/logoicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<link rel="stylesheet" href="/resources/demos/style.css" />
		<link rel="stylesheet" type="text/css" href="../design/css/promote.css" media="screen" />
	</head>
	
	<body>
<?php
	
		if (isset($_POST) && (!empty($_POST['loginPro']))) {
			$loginPro = $_POST['loginPro'];
		}
		
		else if (isset($_GET) && (!empty($_GET['loginPro']))) {
			$loginPro = $_GET['loginPro'];
		}
		
		$sql = ("SELECT loginPro, promo_acc FROM Users WHERE login = '".$_SESSION['login']."'");
		$req = 	mysql_query($sql) or die ('ERREUR '.mysql_error()); 
		$data= mysql_fetch_assoc($req);
		
		if($data['loginPro'] == NULL && $data['promo_acc'] == "") {
			$sql = ("UPDATE Users SET loginPro = '".$loginPro."', promo_acc = 'no' WHERE login = '".$_SESSION['login']."'  ");
			$req = 	mysql_query($sql) or die ('ERREUR '.mysql_error()); 
?>
			<br><br>
			<p>Your request has been sent, wait for the admin response</p>
			<button onclick="window.close();" id="close"><img src="../design/images/close_window.png"></button>
	
<?php
		}
		
		else {
?>
			<br><br>
			<p>You've already sent a request please be patient :) </p>
			<button onclick="window.close();" id="close"><img src="../design/images/close_window.png"></button>
			
<?php
		}
?>
	
	</body>
	
	