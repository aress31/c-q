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
		<link rel="stylesheet" type="text/css" href="../design/css/create_quiz.css" media="screen" />
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
		
						<article class="left_section">
							<h2>Creating a new Quiz: Step 1/2 </h2>
							<hr>
							<form action="../treatments/add_quiz.php" method="POST">
			
								<div class="create">
									Insert Quiz Title: <br>
									<input id="Q_title" type="text" name="quiz_title" placeholder = "Quiz Title" required><br>
								</div>
								<div class="create">
									<label>
										Choose category:<br>
									</label>
									<select name="category">
										<option> Networks </option>
										<option> Telecom </option>
										<option> Programming </option>
										<option> Universe </option>
										<option> Geography </option>
										<option> History </option>
									</select>
						​				
								</div>
								<div class="create">
									<label>
										Choose Type:<br>
									</label>​
									<select name="type">
										<option> Live </option>
										<option> Classic </option>
									</select>
						
								</div>
								<div class="create">
									<label>
										Choose Level:<br></label>​
										<select name="level">
										<option selected> Easy </option>
										<option> Medium </option>
										<option> Hard </option>
									</select>
										
								</div>
								<div class="create">
									<label>
									Timer:<br></label>​
									<script>					
										$function
										({function entext()
										{
										alert(document.f1.selected.value);
										document.f1.time.disabled=false;
										}
										});
									</script>
									<select name="timer" onChange="entext()">
										<option> YES </option>
										<option selected> NO </option>
									</select>				
								</div>
								<div class="create">
									<label>​Time ( in min ) : <br></label>​
									<input class="time" type="text" name="time" value="" ><br>
								</div>
								<input id="button" type="submit" value="Next">
							</form>	
						</article>
	
						<article class="right_section">
							<p>This video will help you to create a new Quiz</p>
							<video width="90%" height="90%" controls autoplay muted >
							  <source src="../design/videos/test.ogg" type="video/ogg">
							  <source src="../design/videos/test.mp4" type="video/mp4">
							  <source src="../design/videos/test.webm" type="video/webm">
							  <object data="../design/videos/test.mp4" width="320" height="240">
								<embed width="320" height="240" src="../design/videos/test.swf">
							  </object>
							</video>
							<p>If you need further information, you can always consult the <a href="" >Help page</a></p>
						</article> 	 	
				</section>			
					
					<?php
						include('../modules/footer.php');
					?> 
				</section>
		</section>
	</body>
</html>
