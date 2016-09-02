<?php   
	require('../core/includes/functions.php'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Courses & Quizzes</title>
		<link rel="shortcut icon" href="../design/images/logoicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="../design/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../design/css/home_page.css" media="screen" />
		<script type="text/javascript" src="../js/jquery/jquery.core.js"></script>
		<script type="text/javascript" src="../js/jquery/jquery.superfish.js"></script>
		<script type="text/javascript" src="../js/jquery/jquery.jcarousel.pack.js"></script>
		<script type="text/javascript" src="../js/jquery/jquery.easing.js"></script>
		<script type="text/javascript" src="../js/jquery/jquery.scripts.js"></script>
		<script type="text/javascript" src="../js/nav.js"></script>
		<script type="text/javascript" src="../js/basiccalendar.js"></script>
	</head>
	
	<body>
		<?php
			include('../modules/float.php');
		?>   
		<section id="wrap">
				<section id="main_container">
					<?php
						include('../modules/header.php');
						include('../modules/banner.php');
						include('../modules/content.php');	
						include('../modules/footer.php');
					?> 
				</section>
		</section>
	</body>
</html>
