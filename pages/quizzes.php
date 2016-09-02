<?php include("../core./includes/functions.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>Courses</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" href="../design/css/quizzes_css.css" />
		<link rel="stylesheet" href="../design/css/style.css" />
		
    </head>
	

	
    <body>
	<div id=wrap>
	<div id=main_container>
	<?php include("../modules/header.php"); ?>
	<div class=trait></div>
	
	
	
		<article class=article1>
		
        <h2 class=BrowseCourses> Browse Quizzes</h2>
		
         <form action="quizzes.php" method="post">
		 
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
	
				$reponse = $bdd->query('SELECT DISTINCT(login) FROM Quizzes') or die(print_r($bdd->errorInfo()));
	
				while($donnees = $reponse->fetch())
				{
		
				?>
				
		<option value="<?php echo $donnees["login"] ?>"><?php echo $donnees["login"]?></option>
		
		
				<?php
				}
				$reponse->closeCursor();
				?>
		
		 </select>
		  
		  
		  
		 <label for="By_Level">By Level: </label>
		 <select class=selection_c1 name="By_Level">
			<option value="%%">Level</option>
			<option value="easy">Easy</option>
			<option value="medium">Medium</option>
			<option value="hard">Hard</option>
			
			
		</select>
		  
		 <!--<label for="Sort_by">Sort by: </label>
		 <select class=selection_c1 name="Sort_by">
			<option value="ORDER BY">Alphabetical Order</option>
			<option value="Most Recent">Most Recent</option>
			<option value="Most Popular">Most Popular</option>
			
		  </select>-->
		  
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
				
				if (!isset($_POST['By_Level']))
				$_POST['By_Level'] = "%%";
				
				if((!isset($_POST['Sort_by'])))
				$_POST['Sort_by'] = "ORDER BY";
				
				if ((!isset($_POST['By_Instructor'])) || ($_POST['By_Instructor'] == "%%"))
				$Instructor = "%%";
				else
				{
				$reponse = $bdd->prepare('SELECT * FROM Quizzes WHERE login LIKE ?');
				$reponse->execute(array($_POST['By_Instructor']));
				$donnee= $reponse->fetch();
				$Instructor=$donnee['IdQz'];
				
				$reponse->closeCursor();
				}
				echo $_POST['Sort_by'];
				$Sort_by = $_POST['Sort_by'];
				if(($_POST['Sort_by'] == "ORDER BY"))
				$reponse = $bdd->prepare("SELECT * FROM Quizzes WHERE nomTh LIKE ? AND IdQz LIKE ? AND titleQz LIKE ? AND levelQz LIKE ? $_POST[Sort_by] titleQz ") or die(print_r($bdd->errorInfo()));

				//else if (($_POST['Sort_by'] == "Most Popular"))
				//$reponse = $bdd->prepare("SELECT * FROM Quizzes WHERE nomTh LIKE ? AND IdQz LIKE ? AND titleQz LIKE ? ORDER BY  nbAccess DESC ") or die(print_r($bdd->errorInfo()));

				//else if (($_POST['Sort_by'] == "Most Recent"))
				//$reponse = $bdd->prepare("SELECT *
				//FROM parts,lessons
				//WHERE parts.IdL = lessons.IdL
				//HAVING post_date_a IN (SELECT MAX(post_date_a) FROM parts GROUP BY parts.IdL)
				//ORDER BY post_date_a DESC") 
				//or die(print_r($bdd->errorInfo()));

				else
				{
				$reponse = $bdd->prepare('SELECT * FROM Quizzes WHERE nomTh LIKE ? AND IdQz LIKE ? AND titleQz LIKE ? AND levelQz LIKE ?') or die(print_r($bdd->errorInfo()));
				}
				$reponse->execute(array($_POST['By_Cathegory'],$Instructor, $_POST['SearchEnter'], $_POST['By_Level']));

				$i = 0;
				while(($donnees = $reponse->fetch()) && ($i<10))
				{
				?>

						
				
	<p>  <?php  $reponse2 = $bdd->prepare('SELECT login FROM Quizzes WHERE IdQz = ?');
				$reponse2->execute(array($donnees['IdQz']));
				$donnees2= $reponse2->fetch();
				$Instructor=$donnees2['login'];
				$reponse2->closeCursor();
				
				//$reponse1 = $bdd->prepare("SELECT COUNT(IdQz) FROM parts WHERE  IdL = ? ");
				//$reponse1->execute(array($donnees['IdL']));
				//$donnees1= $reponse1->fetch();
				//$Nb=$donnees1['COUNT(IdL)'];
				//$reponse1->closeCursor();
				
				//$Nb_acceess=$donnees['nbAccess'];
				
				
							?>
			<?php 
			if( $donnees["typeQz"] == "Classic")
			{
			?><form action="../pages/quizClassic.php" method="post"><?php
		} 
		
		else
		{
		?>
		<form action="../pages/quiz.php" method="post">
		<?php
		}
					?>	
				
		<strong class=titre><a class=lien_titre href=# ><?php echo $donnees["titleQz"] ?></a></strong>
		<span class=logo_part_b >
		<input class=logo_part type="submit" src="../design/images/ico_home_blue1.png"> 
		<input type=hidden name="quiz_id" value=<?php echo $donnees['IdQz'];?>>
		<input type=hidden name="Author" value="<?php echo $Instructor;?>">
		<input type=hidden name="quiz_title" value="<?php echo $donnees['titleQz'];?>">
		<input type=hidden name="Theme" value="<?php echo  $donnees["nomTh"];?>">
		<input type=hidden name="Type" value="<?php echo  $donnees["typeQz"];?>">
		</span></br>
		
		<span class=Author><?php echo "$Instructor" ?></span></br>
		<span class=Theme><?php echo "   $donnees[nomTh]" ?></span></br>
		<!-- <span class=Parts><?php echo "            $Nb Part(s)" ?></span> -->
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
		<span class=resultat> <?php echo "$i quizze(s) found";?></span>
		<img src="../design/images/ou.jpg" name=etude class=etude>

		<div class=trait></div>
		
		<?php include("../modules/footer.php"); ?>
		
	<div>
	</div>
    </body>
</html>





