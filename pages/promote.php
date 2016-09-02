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
		
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script>
			$(function() {
									
				$( "#selectable" ).selectable();
				
				$('#left_submit').click(function(){
					//Admin Selected
					var selected = $('li.ui-selected').find('em').html();
				
					var url = "../treatments/promotion_request.php";
					var params =  "?loginPro=" + selected;
					window.location.href = url + params;
					});
				
			});
		</script>
	</head>

	<body>
		<section id="main_container">
			<section class="left">
				<ol id="selectable">
				<?php 
					//Administrator list
					$sql = ("SELECT login FROM Users WHERE status = 'admin' ");
					$req = 	mysql_query($sql) or die ('ERREUR '.mysql_error()); 
					while ($data = mysql_fetch_assoc($req)) {
				?>
					 <li class="ui-state-default">
						<div style = "background-image:url(../design/images/profile_photo_df.jpg);" id = "avatar" ><em><?php echo $data['login']?></em></div>
					</li>		
				<?php
				}
				?>
				</ol>
				<input type="submit" name="submit"  value="Submit" id="left_submit">
			</section>
		
			<aside>
				<div id="content">
					<h1>Research by login:</h1>
					<form method="POST" action="../treatments/promotion_request.php">
						<label for login>Administrator's Login: <label><br>
							<select name="loginPro" >
							<?php 
								//Administrator list
								$sql = ("SELECT login FROM Users WHERE status = 'admin' ");
								$req = 	mysql_query($sql) or die ('ERREUR '.mysql_error()); 
								while ($data = mysql_fetch_assoc($req)) {
							?>
							   <option value="<?php echo $data['login']; ?>"><?php echo $data['login']; ?></option>
							<?php
								}
							?>
							</select>
							<br>
							<input type="submit" name="submit" value="Submit" id="right_submit">
					<form>
				</div>
			</aside>
		</section>
	</body>
</html>

	
	