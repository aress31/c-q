<?php
				//choosing header to show
				function  Navigation($state)
				{
					//choose which header to show in function of being already signed in or not
					$activePage = basename($_SERVER['PHP_SELF']);
					//if not signed in
					if($state=='off')
						$rows = array("Home:index.php","Courses:courses.php","Quizzes:quizzes.php","About:about.php","Help:help.php","Sign In:signIn.php");
					//if signed in as admin
					else if($_SESSION['status'] == 'admin')
						$rows = array("My Home:admin_homepage.php","Courses:courses.php","Quizzes:quizzes.php","About:about.php","Help:help.php","Sign Out:logOut.php");
					//if signed in as user
					else
						$rows = array("My Home:user_homepage.php","Courses:courses.php","Quizzes:quizzes.php","About:about.php","Help:help.php","Sign Out:logOut.php");
					echo '<nav>';
					echo '<ul>';
					foreach($rows as $row)
					{
						$nav = explode(":", $row);
						$page = trim($nav[0]);
						$link = trim($nav[1]);
						if($link == $activePage)
						{
							echo '<li><a class="current" href="' . $link .  '">' . $page . '</a></li>';
						}
						else
						{
							echo '<li><a href="' . $link .  '">' . $page . '</a></li>';
						}
					}
					echo '</ul>';
							echo '</nav>';
				}
				
				function  Random_password() {
					$characters = array("a", "b", "c", "d", "e", "f","g", "h", "i", "j", "k", "l","m",
					"n", "o", "p", "q", "r","s", "t", "u", "v", "w", "x","y","z", 0, 1, 2, 3, 4, 5, 6,
					 7, 8, 9);
					$random_characters = array_rand($characters, 8);
					$password = "";
					
					foreach($random_characters as $i) {
						$password .= $characters[$i];
					}
					
					return $password;
				}
				
				function get_lessons() {
					$lesson_title_array = array();
					
					$sql = ('SELECT idL FROM Parts WHERE login = "'.$_SESSION['login'].'"') or die(mysql_error());
					$req = mysql_query($sql) or die(mysql_error());
					
					while ($data = mysql_fetch_assoc($req)) {
																	
						$sql = ('SELECT titleL FROM Lessons WHERE idL = "'.$data['idL'].'"');
						$req1 = mysql_query($sql) or die(mysql_error());
						
						$data = mysql_fetch_assoc($req1) or die(mysql_error());
						$lesson_title_array[] = $data['titleL'];
					}	
					
					$lesson_title_array = array_unique($lesson_title_array);
					
					return $lesson_title_array;
				}
				
				function get_parts($lesson_title) {
					$part_title_array = array();
					
					$sql = ('SELECT idL FROM Lessons WHERE titleL = "'.$lesson_title.'"') or die(mysql_error());
					$req = mysql_query($sql) or die(mysql_error());
					$data = mysql_fetch_assoc($req);
					
					$sql = ('SELECT titlePart FROM Parts WHERE idL = "'.$data['idL'].'"') or die(mysql_error());
					$req = mysql_query($sql) or die(mysql_error());
					
					while ($data = mysql_fetch_assoc($req)) {
																	
						$part_title_array[] = $data['titlePart'];
					}	
									
					return $part_title_array;
				}
				
				function test_connectivity() {
					
					if (!session_id()) 
						session_start();
					
					if (!$_SESSION['login']){ 
						header('Location: ../pages/signIn.php');
						die();
					}
				}
?>