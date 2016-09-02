<?php   
	//require('../core/includes/functions.php'); 
	require('../core/boot.php');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="UI Elements: jQuery Popout Menu" />
<meta name="keywords" content="jquery, menu, navigation, popout, slide up, slide down "/>
		<title>Courses & Quizzes</title>
		<link rel="shortcut icon" href="../design/images/logoicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="../design/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../design/css/quiz.css" media="screen" />			<script type="text/javascript" src="../js/jquery/jquery.core.js"></script>
		<script type="text/javascript" src="../js/prepare_quiz_live.js"></script>
	</head>
	
	<body>

		<section id = "wrap">
			
			<?php
				include('../modules/header.php');
			?>
			
			<hr>

			<?php
			
				if (isset($_POST) && (!empty($_POST['quiz_title'])) && (!empty($_POST['quiz_id']))){
					
					extract($_POST);
		
					if (isset($_SESSION) && (!empty($_SESSION['firstname'])) && (!empty($_SESSION['lastname']))){
						extract($_SESSION);
					}
					
					else{
						$firstname = "GUEST";
						$lastname = "";
					}

				}	
			?>
			<input type="hidden" name="quiz_to_start" id="quiz_to_start" value= '<?php echo $_POST['quiz_id'] ?>'/>
			<div class="box"></div>
			<div class="quizstartdiv">
				<input type="submit" name="startquiz" value="Start Quiz" id="startquiz"/>
			</div>
			<div class="col-full">
				<div id="fake"></div>
				<span class="initialcount"></span>
			
				<div id="allquestions">
				</div><!-- end allquestions -->

				<div class="finished" id="finished">
					<h2 id="score"></h2>

					<div id="quizend">
						<input id="endquiz" type="submit" value="Try Again" name="endquiz">
					</div>
				</div><!-- end finished -->
				<div class="meter"><span> </span></div>
				<div id="submiterrors"></div>
				<div id="navigation">
					<span id="submit">Submit</span>
					<span id="next">Next &#8250;</span>
					<span id="finish">Finish</span>
				</div><!-- end navigation -->

			</div>
			<?php
				include('../modules/footer.php');
			?> 
			
		</section>
	</body>
</html>
