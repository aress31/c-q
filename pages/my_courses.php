<?php   
	require('../core/boot.php'); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Courses & Quizzes</title>
		<link rel="shortcut icon" href="../design/images/logoicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="../design/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../design/css/signIn.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../design/css/my_courses.css" media="screen" />
	</head>
	<?php
		test_connectivity();
	?> 
	<body>
		<section id = "wrap">
			<section id="main_container">
			<?php
				include('../modules/header.php');
			?>
			
			<hr>
			
			<section class = "content">
				
				<p class="my_courses">Would you like to create a new lesson ?</p>
				<br>	
				<form action="../treatments/new_lesson.php" method="POST" enctype = "multipart/form-data">
					<label id="attention">Be sure not to use the ' / ' charecter </label>
					<br>
					<br>
					<label>Lesson Title: </label>
					<br>
					<input type="text" name="lesson_title">
					<br>
					<br>
					<label>Lesson Theme: </label>
					<br>
						<select name="lesson_theme">
							<option value="Networks">Networks</option>
							<option value="Telecom">Telecom</option>
							<option value="Programming">Programming</option>
							<option value="Universe">Universe</option>
							<option value="Geopgraphy">Geopgraphy</option>
							<option value="History">History</option>
						</select>
					<br>
					<p class="my_courses">You must upload the first part of your new lesson, right now !</p>
					<br>
					<label>File (PDF only| max. 10 Mo) :</label>
					<br>
					<input type = "file" name = "my_file" id = "my_file">
					<br>
					<label>File Title (max. 50 caractères) :</label>
					<br>
					<input type="text" name="part_title" placeholder = "File Title" id="part_title">
					<br>
					<input type = "hidden" name = "max_file_size" value = "10485760">
					<input type="submit" name="submit" value="Submit" />
				</form>
			
			<?php 
				$lesson_title_array = array();
				$lesson_title_array = get_lessons(); 
				
				if(empty($lesson_title_array))
					echo "No lesson yet !";
				
				else {	
					foreach($lesson_title_array as $lesson_title) {
					$i = 1;
					$part_title_array = array();
					$part_title_array = get_parts($lesson_title);
					
			?>
				<table>
						<thead>
							<tr>
								<th class = "ico">
									<img src = "../design/images/logoicon.jpg" alt = "logoicon">
								</th>
								<th colspan="2">
									<?php echo $lesson_title; ?>
								</th>
							</tr>
						</thead>
						
						<tbody>
												
			<?php
					foreach($part_title_array as $part_title) {
						$sql = ('SELECT post_date_A FROM Parts WHERE titlePart = "'.$part_title.'"') or die(mysql_error()) ;
						$req = mysql_query($sql) or die(mysql_error()) ;
						$post_date = mysql_result($req, 0) or die(mysql_error()) ;
			?>
					<tr>
						<td >
						<?php echo $i; ?>
						</td>
						<td class = "part_title">
						<?php echo $part_title; ?>
						</td>
						<td >
						<?php echo $post_date; ?>
						</td>
					</tr>
					</tbody>
			<?php
						$i++;
					}
			?>
					<tfoot>
						<tr>
							<td colspan="3">
									<form method = "POST" action = "../treatments/upload.php" enctype = "multipart/form-data">
										<label for = "file_name">File (PDF only| max. 10 Mo) :</label>
										<input type = "file" name = "my_file" id = "my_file">
										<br>
										<label for="part_title">File Title (max. 50 caractères) :</label>
										<input type="text" name="part_title" placeholder = "File Title" id="part_title">
										
										<input type = "hidden" name = "max_file_size" value = "10485760">
										<input type = "hidden" name = "lesson_title" value = "<?php echo  $lesson_title; ?>">
										<input type="submit" name="submit" value="Submit" />
								</form>
							</td>
						</tr>
					</tfoot>
					
				</table>
			<?php
					}
				}
			?>
			</section>
					
			<?php
				include('../modules/footer.php');
			?> 
			</section>
		</section>
	</body>

</html>
