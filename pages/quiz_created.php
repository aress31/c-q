<?php
	require('../core/boot.php'); 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Courses & Quizzes</title>
		<link rel="shortcut icon" href="../design/images/logoicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="../design/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../design/css/AHP.css" media="screen" />
		<script type="text/javascript" src="../js/nav.js"></script>
	</head>
	<?php
		test_connectivity();
	?> 
	

	<body>
      	
		<?php
			include('../modules/float.php');
		?>   
		
		<section id="wrap">
				
				<section id="main_container">

					<?php
						include('../modules/header.php');
					?>
					
					<hr>
					
					<section >

						<?php
							include('../modules/profile_header.php');
						?>
						
						<h1 align="center"><font size="6">Your quiz has been successfully created</font><br/>
						<font size="3"><a href="admin_homepage.php">back to my home page</a></font></h1>
					</section>			
					
					<?php
						include('../modules/footer.php');
					?> 
				</section>
		</section>
	</body>
</html>
