<?php
	require('../../core/includes/functions.php'); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Sign Up</title>
		<link rel="stylesheet" type="text/css" href="../../design/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../../design/css/signUp.css" media="screen" />
		<link rel="stylesheet" href="/resources/demos/style.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		 <script>
			$(function() {
			$( "#datepicker" ).datepicker({ dateFormat: "d M, y"});
			});
		</script>
	</head>
        
	<body>
	
		<section id = "wrap">
		
			<?php
				include('../../modules/header.php');
			?>
			
			<hr>
			
			<article>
					<h1>Sign Up</h1>
					
					<h2>WHY SIGNING UP ?</h2>
					
					<p>
						By registering you get a personalized member area where you can access the history of your results, 
						<br> add friends and much more, so lets' go!
					</p> 
			</article>
			
			<p class="error">
				<img src = "../../design/images/notification_error.png" alt = "notification_error" id = "notification_error">
				This email is already used please choose an other one.
			</p>
			
			<?php
				include('../../modules/signUp_form_module.php');
			?>
			
			<img src = "../../design/images/temp_logo.jpg" alt = "temp_logo" id = "temp_logo">	
			
			<?php
				include('../../modules/footer.php');
			?>
			
		</section>
	</body>
</html>
