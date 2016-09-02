<?php   
	require('../core/includes/functions.php'); 
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Courses</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="../design/css/courses_css.css" />
		<link rel="stylesheet" href="../design/css/style.css" />
		
    </head>
	<?php
		test_connectivity();
	?> 
    <body>
		<div id="wrap">
			<section id="main_container">
			<?php include('../modules/header.php'); ?>
			
			<div class=trait></div>
				<article class=article1>
					<h2 class=BrowseCourses> Browse courses</h2>
						<form action="courses.php" method="post">
							<div class=button_search>
								<input type="search" name="SearchEnter" />
								<input name=valid type="submit" value="Search"  />
							</div>
		 
							<?php 
								if(!isset($_POST['valid']))
								$_POST['valid'] = "";
		 
								if( (!isset($_POST['SearchEnter'])) || ($_POST['SearchEnter'] == "") )
								{
									$_POST['SearchEnter'] = "%%";
								}
		 
								if(($_POST['valid'] == "Search") && ($_POST['SearchEnter'] == "%%"))
								{
									echo "<span class=Noresearch>No research</span>";
								}
							?>
		 
		 
		 
							<p class=choixDeroulant>
								<label for="By_Cathegory">By Cathegory: </label>
								<select class=selection_c1 name="By_Cathegory">
									<option value="%%">All Courses</option>
									<option value="Networks">Networks</option>
									<option value="Telecom">Telecom</option>
									<option value="Programming">Programming</option>
									<option value="Universe">Universe</option>
									<option value="Geopgraphy">Geopgraphy</option>
									<option value="History">History</option>
								</select>
			
								<label for="By_Instructor">By Instructor: </label>
								<select class=selection_c1 name="By_Instructor">
									<option value="%%">Default</option>
				
									<?php 			
										try
										{
										$bdd = new PDO('mysql:host=localhost;dbname=c&q', 'root', '');
										}
										catch(Exception $e)
										{
										die('Erreur : '.$e->getMessage());
										}	
		
										$reponse = $bdd->query('SELECT DISTINCT(login) FROM parts,lessons WHERE parts.idL = lessons.idL') or die(print_r($bdd->errorInfo()));
		
										while($donnees = $reponse->fetch())
										{
			
									?>
					
									<option value="<?php echo $donnees["login"] ?>"><?php echo $donnees["login"]?></option>
			
									<?php
										}
										$reponse->closeCursor();
									?>
			
								</select>
			  
								<label for="Sort_by">Sort by: </label>
								<select class=selection_c1 name="Sort_by">
									<option value="ORDER BY">Alphabetical Order</option>
									<option value="Most Recent">Most Recent</option>
									<option value="Most Popular">Most Popular</option>
								</select>
			  
								<input name=valid class=ok1 type='submit' value='ok' />
							</p>
		
		 
						</form>
				</article>
		 
				<div class=retour_ligne ></div>
				<div class=trait></div>
		
				<article class=article2>
		
					<?php
						if (!isset($_POST['By_Cathegory']))
						$_POST['By_Cathegory'] = "%%";
						
						if((!isset($_POST['Sort_by'])))
						$_POST['Sort_by'] = "ORDER BY";
						
						if ((!isset($_POST['By_Instructor'])) || ($_POST['By_Instructor'] == "%%"))
						$Instructor = "%%";
						else
						{
						$reponse = $bdd->prepare('SELECT * FROM parts WHERE login LIKE ?');
						$reponse->execute(array($_POST['By_Instructor']));
						$donnee= $reponse->fetch();
						$Instructor=$donnee['IdL'];
						
						$reponse->closeCursor();
						}
						echo $_POST['Sort_by'];
						$Sort_by = $_POST['Sort_by'];
						if(($_POST['Sort_by'] == "ORDER BY"))
						$reponse = $bdd->prepare("SELECT * FROM lessons WHERE nomTh LIKE ? AND IdL LIKE ? AND titleL LIKE ? $_POST[Sort_by] titleL ") or die(print_r($bdd->errorInfo()));

						else if (($_POST['Sort_by'] == "Most Popular"))
						$reponse = $bdd->prepare("SELECT * FROM lessons WHERE nomTh LIKE ? AND IdL LIKE ? AND titleL LIKE ? ORDER BY  nbAccess DESC ") or die(print_r($bdd->errorInfo()));

						else if (($_POST['Sort_by'] == "Most Recent"))
						$reponse = $bdd->prepare("SELECT *
						FROM parts,lessons
						WHERE parts.IdL = lessons.IdL
						HAVING post_date_a IN (SELECT MAX(post_date_a) FROM parts GROUP BY parts.IdL)
						ORDER BY post_date_a DESC") 
						or die(print_r($bdd->errorInfo()));

						else
						{
						$reponse = $bdd->prepare('SELECT * FROM lessons WHERE nomTh LIKE ? AND IdL LIKE ? AND titleL LIKE ?') or die(print_r($bdd->errorInfo()));
						}
						$reponse->execute(array($_POST['By_Cathegory'],$Instructor, $_POST['SearchEnter']));

						$i = 0;
						while(($donnees = $reponse->fetch()) && ($i<10))
						{
					?>

						
				
							<p> <?php  $reponse2 = $bdd->prepare('SELECT login FROM parts WHERE Idl = ?');
										$reponse2->execute(array($donnees['IdL']));
										$donnees2= $reponse2->fetch();
										$Instructor=$donnees2['login'];
										$reponse2->closeCursor();
										
										$reponse1 = $bdd->prepare("SELECT COUNT(IdL) FROM parts WHERE  IdL = ? ");
										$reponse1->execute(array($donnees['IdL']));
										$donnees1= $reponse1->fetch();
										$Nb=$donnees1['COUNT(IdL)'];
										$reponse1->closeCursor();
										
										$Nb_acceess=$donnees['nbAccess'];
										
										
								?>
								<form action="selectPart.php" method="post">
									<strong class=titre><a class=lien_titre href=# ><?php echo $donnees["titleL"] ?></a></strong>
								
									<span class=logo_part_b >
										<input class="logo_part" type="submit"  value="Submit courses" />
										<input type=hidden name="IdLesson" value="<?php echo $donnees["IdL"];?>" />
										<input type=hidden name="Author" value="<?php echo $Instructor;?>" />
										<input type=hidden name="Title" value="<?php echo $donnees['titleL'];?>" />
										<input type=hidden name="Theme" value="<?php echo  $donnees["nomTh"];?>" />
									</span></br>
								
									<span class=Author><?php echo "$Instructor" ?></span></br>
									<span class=Theme><?php echo "   $donnees[nomTh]" ?></span></br>
									<span class=Parts><?php echo "            $Nb Part(s)" ?></span>
									</br>
									</br>
								
							</p>
								</form>
								<?php
									$i++;
			
						}

									$reponse->closeCursor();
								?>
			
			
		
				
			
				</article>
				<span class=resultat> <?php echo "$i course(s) found";?></span>
				<img src="../design/images/etude.jpg" name=etude class=etude>

				<div class=trait></div>
		
				<?php include("../modules/footer.php"); ?>
		

		</div>
		</div>
    </body>
</html>





