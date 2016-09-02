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
					
							
						<section class="wide_section">
							<img id="" width="100%" src="../design/images/slider_photo3.jpg" alt="" title="" border="0">
						<div class="clear"></div>
						</section>
						<section class="identification">
						<img id="profile_img" src="../design/images/profile_photo_df.jpg" alt="" title="" border="0">
							<article>
								<?php echo '<h1>' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . '</h1><br/>Admin';?>
							</article>
						<div class="clear"></div>

						</section>
						
						<article class="left_section">

								<ul>
									<li><a href="create_quiz_1.php" >Create a new Quiz</a></li>
									<li><a href="comingSoon.php" >My Quizzes</a></li>
									<li><a href="my_courses.php" >My Courses</a></li>
									<li><a href="historique_Admin.php" >History</a></li>
								</ul>
							<div class="clear"></div>
						</article>

						<article class="center_section">
							<?php
								$sql = ("SELECT login, promo_acc FROM Users WHERE (loginPro = '".$_SESSION['login']."' AND  promo_acc = 'no') ");
								$req = 	mysql_query($sql) or die ('ERREUR '.mysql_error()); 
								while ($data= mysql_fetch_assoc($req)) {
									$applicant_login = $data['login'];
							?>
								You received a promotion request from <?php echo $applicant_login; ?>, do you want to promote him/her ?
								<hr>
								<form method="POST" action="../treatments/promotion_response.php">
								<input type="hidden" name="applicant_login" value="<?php echo $applicant_login; ?>">
								<label for="accept">Accept: </label> <input type="radio" name="choice" value="accept">
								<label for="deny">Deny:   </label> <input type="radio" name="choice" value="deny">
								<input type="submit" value="Submit"/>
								<form>
								<br>
							<?php
								}
							?>
							<div class="clear"></div>
						</article>
	
						<article class="right_section">
							<a href="quizzes.php"><div class="shortcut" id="shortcut_1">Quizzes</div></a>
							<a href="courses.php"><div class="shortcut" id="shortcut_2">Courses</div></a>
							<a href="comingSoon.php"><div class="shortcut" id="shortcut_3">Messages</div></a>
							<a href="friends.php"><div class="shortcut" id="shortcut_4">Friends</div></a>
							<a href="settings.php"><div class="shortcut" id="shortcut_5">Settings</div></a>
							<a href="logOut.php"><div class="shortcut" id="shortcut_6">Log Out</div></a>
							<div class="clear"></div>	
						</article>
					</section>			
					
					<?php
						include('../modules/footer.php');
					?> 
				</section>
		</section>
	</body>
</html>
