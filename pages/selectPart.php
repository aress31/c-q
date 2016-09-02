<?php include("../core/includes/functions.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <title>Courses</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	    <link rel="stylesheet" href="../design/css/selectPart_css.css" />
		<link rel="stylesheet" href="../design/css/style.css" />
		
    </head>
		<div id=wrap>
		<div id=main_container>
			<?php include("../modules/header.php"); ?>

		<body>
		<div class=page>
	
				<?php 		

				
				try
				{
				$bdd = new PDO('mysql:host=localhost;dbname=c&q', 'root', '');
				}
				catch(Exception $e)
				{
				die('Erreur : '.$e->getMessage());
				}
								
				$reponse = $bdd->query("UPDATE lessons SET nbAccess = nbAccess + 1 WHERE IdL = $_POST[IdLesson]") or die(print_r($bdd->errorInfo()));

				
				?>
				
				<div class=trait></div>
				
				<div class=bloc_i>
				<span class=info class=title>Title: <span class=I><?php echo $_POST['Title']?> </span></span>
				<span class=info class=title>Author: <span class=I><?php echo $_POST['Author']?></span></span>
				<span class=info class=title>Cathegory: <span class=I><?php echo $_POST['Theme']?> </span></span>
				</div>
				
				<div class=trait></div>

				<form action="SelectPart.php" method="post">
				<div class=bloc_part>
				<?php
				$reponse = $bdd->query("SELECT * FROM parts,lessons WHERE parts.IdL = $_POST[IdLesson] AND parts.IdL = lessons.IdL ") or die(print_r($bdd->errorInfo()));
				
				$i=0;
				while($donnees = $reponse->fetch())
				{
				$requete="../courses/$donnees[login]/$donnees[titleL]/$donnees[titlePart].pdf";
				?>
				</br>
				<img class=pdf src="../design/images/pdf1.jpg" />
				<div class=ssbloc>
				<span class=part><?php echo $donnees["titlePart"];?></br></span>
				</br>
				<span class=DU><a href="<?php echo "$requete";?>" ><img class=pdfd src="../design/images/format-pdf.gif" /></a>    <input class=VL type=image name=View value="<?php echo $donnees['IdPart']?>" src="../design/images/v.png"  /></span>
				 
				</br>
				</br>
		        </br>
				</br>
				</div>
				
				<?php
				if(!isset($_POST["View"]))
				$_POST["View"] = "";
				
				

				
				if($_POST["View"] == "$donnees[IdPart]")
				{
				echo
				"<object type=application/pdf width=500 height=400 name=PDF id=PDF >
				<param name=src value=\"$requete\" />
				</object>";
				echo "</br>";
				echo "<input class=fermer type=submit name=View value=Fermer />";
				}
				
				}
				$reponse->closeCursor();
				?>
				<input type=hidden name="Author" value="<?php echo $_POST['Author'];?>" />
				<input type=hidden name="Title" value="<?php echo $_POST['Title'];?>" />
				<input type=hidden name="Theme" value="<?php echo  $_POST['Theme'];?>" />
				<input type=hidden name="IdLesson" value="<?php echo  $_POST['IdLesson'];?>" />
				
				</div>
				
				</form>
				
				
				
				
				
				
				<div class=right_box>
				
				<span class=titrerelated >Related courses :</span>
				
				<?php $reponse = $bdd->prepare("SELECT * FROM lessons WHERE titleL LIKE ? ") or die(print_r($bdd->errorInfo()));
								$reponse->execute(array("%$_POST[Title]%"));
								
								//echo "%$_POST[Title]%";
				
				while($donnees = $reponse->fetch())
				{
				?>
				</br>
				</br>

				<span class=titrecourses><?php echo $donnees['titleL']; ?></span>
				
				
				<?php
				}
				$reponse->closeCursor();
				?>
				
				</br>
				</br>
				</br>
				</br>
				<span class=recom_quizzes >Recommended Quizzes: </span>
				<?php $reponse = $bdd->prepare("SELECT * FROM quizzes WHERE titleQz LIKE ? ") or die(print_r($bdd->errorInfo()));
								$reponse->execute(array("%$_POST[Title]%"));
								
								//echo "%$_POST[Title]%";
				while($donnees = $reponse->fetch())
				{
				?>
				</br>
				</br>

				<span class=titre_quizzes><?php echo $donnees['titleQz']; ?></span>
				
				
				<?php
				}
				$reponse->closeCursor();
				
				?>
				
				
				
				</div>
				
				<script type="text/javascript">
				PDF.setZoom(10%);
				</script>
				
		</div>
		</body>
		<div class=trait></div>
		<?php include("../modules/footer.php"); ?>
		</div>
		</div>

</html>