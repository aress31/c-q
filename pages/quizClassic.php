<?php   
	//require('../core/includes/functions.php'); 
	require('../core/boot.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="description" content="UI Elements: jQuery Popout Menu" />
		<meta name="keywords" content="jquery, menu, navigation, popout, slide up, slide down "/>
		<title>Courses & Quizzes</title>
		<link rel="shortcut icon" href="../design/images/logoicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="../design/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../design/css/quiz.css" media="screen" />			<script type="text/javascript" src="../js/jquery/jquery.core.js"></script>
		<script type="text/javascript" src="../js/prepare_quiz_classic.js"></script>
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
					
					$sql = mysql_query("SELECT * FROM quizzes WHERE IdQz = $quiz_id" ) or die(mysql_error());
					$row = mysql_fetch_array($sql);
					
					extract($row);

					$timer = $row['timerQz'];
					

					echo "<input type='hidden' name='timer' id='quiz_timer' value= $timer />";

				}	
			?>
			
			<input type="hidden" name="quiz_to_start" id="quiz_to_start" value= '<?php echo $quiz_id ?>'/>
			<input type="hidden" name="quiz_to_start" id="quiz_to_start" value= '<?php echo $quiz_id ?>'/>
			
			<div class="box"></div>
			
			<div class="quizstartdiv">
			
				<input type="submit" name="startquiz" value="Start Quiz" id="startquiz"/>

			</div>
			
			<div class="col-full">
				
				<div id="fake"></div>
				<div id="countdown"></div>
				
				<script type="text/javascript">
				
					$('#startquiz').click(function() {
						//time to count down
						var timer = $('#quiz_timer').val();
						if (timer!=0)
						{
							var t = timer.split(/[:]/);
							var d = new Date(0, 0, 0, t[0], t[1], t[2]);
							var startTime = new Date();              
							var endTime = new Date();
							
							endTime.setHours(
								startTime.getHours() + d.getHours() - 1,
								startTime.getMinutes() + d.getMinutes(), 
								startTime.getSeconds() + d.getSeconds(), 
								startTime.getMilliseconds()
							);

							//function to update counter
							function update(){
								var currentTime = new Date();
								var remainingTime = new Date();
								remainingTime.setTime(endTime.getTime()-currentTime.getTime());
					
								if(remainingTime.getHours()==0 && remainingTime.getMinutes()==0 && remainingTime.getSeconds()==0)
									$('#finish').trigger('click');
					
								$("#countdown").text(remainingTime.getHours()+":"+remainingTime.getMinutes()+":"+remainingTime.getSeconds());

								//call itself every second
								setTimeout(update,1000);
							}

							//start the countdown
							update();
						}
						else
							$("#countdown").text("No time limit for this quiz");
					});
				</script>
			
				<div id="allquestions">
				</div><!-- end allquestions -->

				<div class="finished" id="finished">
					<h2 id="score"></h2>
					<div id="quizend">
						<input id="endquiz" type="submit" value="Try Again" name="endquiz">
					</div>
					
					<div id="result">
					</div>
					
				</div><!-- end finished -->
				
				<div id="submiterrors"></div>
				
				<div id="navigation">
					<span id="submitClassic">Submit</span>
					<span id="previous">&#8249; Previous &nbsp; &nbsp;</span>
					<span id="next">Next &#8250;</span>
					<span id="finish">Finish</span>
				</div><!-- end navigation -->
				<?php
						if (isset($_SESSION) && (!empty($_SESSION['login'])))
						{
							$date = date('Y-m-d H:i:s');
							$sql = ("INSERT INTO participate (login, IdQz, date) VALUES ('".$_SESSION['login']."','" .$quiz_id."','". $date ."') ");
							//$req1="INSERT INTO  VALUES results ('".$login."','".$quiz_id."','".$result."');";
							$req = mysql_query($sql) or die ('ERREUR '.mysql_error());
						}
				?>
			</div>

			<?php
				
				include('../modules/footer.php');
			?> 
			
		</section>
		


	</body>

</html>
