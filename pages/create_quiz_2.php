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
		<link rel="stylesheet" type="text/css" href="../design/css/create_quiz.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../design/css/AHP.css" media="screen" />
		<script type="text/javascript" src="../js/nav.js"></script>
		<script src="../js/test.js" language="Javascript" type="text/javascript"></script>
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

						<h2>Creating a new Quiz: Step 2/2 (Adding Questions)</h2>
						<hr>	
					</article>
					<article class="adding">		
						<form  action="../treatments/add_question.php" method="POST" name="myForm" >

							<div class="create">
								<label>
									Choose question type:<br>
								</label>
								<select id="Qtype" name="type">
									<option onclick="multiple_choice('dynamicInputs');" value="Multiple_choice"> Multiple_choice </option>
									<option onclick="fill_up('dynamicInputs');" value="Fill up"> Fill up </option>
								</select>
							</div>

							<div class="create">
								<label>
									Timer:<br>
								</label>​
								<select name="timer">
									<option> YES </option>
									<option selected> NO </option>
								</select>
							</div>

							<div class="create">
								<label>
									​Time ( in min ):<br>
								</label>​
								<input type="text" name="time" value="">
							</div>
							
							<div class="clear"></div>
							
							<article id="left_sp" class="left_section">	
								<div class="create" id="dynamicInputs"></div>
							</article>
							
							<article id="rr" class="right_section">	
								<div class="create" id="rightA"></div>	
								<div class="create" id="falseA"></div>	
							</article>
							
							<div class="clear"></div>
						</form>
					</article>

					<div class="clear"></div>
						
				</section>	
									
				<?php
					include('../modules/footer.php');
				?> 
			</section>
		</section>
	</body>
</html>
