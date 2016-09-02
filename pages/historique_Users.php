<?php   
	require('../core/boot.php');
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>Historique</title>
                <link rel="stylesheet" type="text/css" href="../style.css" media="screen" />
				<script type="text/javascript" src="../js/jquery/jquery.core.js"></script>
				<script src="http://code.highcharts.com/highcharts.js"></script>
				<script src="http://code.highcharts.com/modules/exporting.js"></script>
                <script language="Javascript" type="text/javascript" src="../js/historique.js" ></script>
				<link rel="stylesheet" type="text/css" href="../design/css/historique.css" media="screen" />
				<link rel="stylesheet" type="text/css" href="../design/css/style.css" media="screen" />

        </head>
        
        <body>
		
		<section id="wrap">
				
				<section id="main_container">
		<?php
		
			include('../modules/header.php');
			
		?>   
				<hr/>
						<section id="left" class="part">
						<h2>COURSES</h2></br></br></br>
						<div class="divpart" >
						
						
						<?php 	
						$login=$_SESSION['login'];
								
								
								// recupère tous les cours que le users a posté
								$req1="select lessons.titleL from lessons where lessons.nbAccess in (select distinct lessons.nbAccess  from Parts as p,Users as u,lessons where u.login='".$login."' and p.login=u.login and lessons.Idl=p.Idl);"; 
								$result1=mysql_query($req1) or die("echec requete");
								
								// recupère les quiz auxquels le user a participé
								$req3="select q.titleQz from quizzes as q, participate as p where p.idQz=q.idQz and p.login='".$login."'";$result3=mysql_query($req3) or die("echec requete");
								?><div class="text_left"><h3 class="text_left">LIST OF COURSES</h3>
								<?php
								//affichage dans la liste du titre des lessons créés par le user
								while($donnees = mysql_fetch_array($result1,MYSQL_ASSOC))
								{
											?>
											<div class="icon_left">
											<article class="text_align"> <?php echo $donnees["titleL"]; ?> </article></div>
								<?php
								}?></div>
								<div class="text_right"><h3 class="text_right">LIST OF QUIZZES</h3>
								
								<?php 
								//affichage dans la liste du titre des quizs créés par le user
								while($donnees2 = mysql_fetch_array($result3,MYSQL_ASSOC))
								{
											?>
											<div class="icon_right">
											<article class="text_align"> <?php echo $donnees2["titleQz"]; ?></article></div>
								
								<?php } ?></div>
								<?php
								
								
								echo '<script language="javascript">';
								echo 'tab1 = new Object();';
								echo 'tab1 = '.json_encode($tab1).';';
								echo '</script>';

								echo '<script language="javascript">';
								echo 'tab2 = new Object();';
								echo 'tab2 = '.json_encode($tab2).';';
								echo '</script>';
						?>
						
								</div>
						
						</section>
						<section id="right" class="part">
						<h2>QUIZZES</h2></br></br></br>
						<div class="divpart">
						<h3>MAXIMUM SCORE PER QUIZ</h3></br></br>
												<?php 
								//recupère tous les idQz auxquel le user à participer				
								$req="select q.idQz from quizzes as q, participate as p where p.idQz=q.idQz and p.login='".$login."';";
								$result3=mysql_query($req) or die("echec requete");
								
								// recupère le quiz et la note maximale correspondente 
								$req2="SELECT distinct quizzes.idQz ,MAX(results.quiz_result) AS NoteMax FROM results LEFT JOIN Quizzes ON results.idQz=quizzes.idQz GROUP BY quizzes.idQz;";
								$result4=mysql_query($req2) or die("echec requete");
								
								// recupère le titre des quiz auxquel le user à participer
								$req="select titleQz from quizzes as q,users as u where u.login='".$login."' and u.login=q.login order by titleQz asc;"; 
								$result5=mysql_query($req) or die("echec requete");
								
								 $tab4=array(); $i=0;
								//recupère et stock la note max pour les bons idQz 
								while($donnees = mysql_fetch_array($result3,MYSQL_ASSOC))
								{
									while($stoks= mysql_fetch_array($result4,MYSQL_ASSOC))
									{
										if($donnees["idQz"]==$stoks["idQz"])
										{
											$tab4[$i]=$stoks["NoteMax"]; $i=$i+1;
										}
									}
								}
								 $tab11=array(); $i=0;
								 //recupération des contenus des tableaux (sortie des requetes)
								while($don=mysql_fetch_array($result5,MYSQL_ASSOC))
								{
									$tab11[$i]=$don["titleQz"];$i=$i+1;
								}
								
								//convertion de tableau de php à javascript
								echo '<script language="javascript">';
								echo 'tab1 = new Object();';
								echo 'tab1 = '.json_encode($tab11).';';
								echo '</script>';

								echo '<script language="javascript">';
								echo 'tab2 = new Object();';
								echo 'tab2 = '.json_encode($tab4).';';
								echo '</script>';
								// utilisation des fonctions javascript pour affichier le graphe  ?>
								<a onclick="basic_bar(tab1,tab2);"><img class="icon_left" src="../design/images/barChart.jpg" alt="" title="" border="0"></a>
								<a onclick="basic_line(tab1,tab2);"><img class="icon_right" src="../design/images/Line Chart.ico" alt="" title="" border="0"></a>
						</div>
						<div class="divpart"></br>
						<h3>NOTE QUIZ BY DATE</h3>
						<select name="month" class="divdown">
						 
						<?php 
						//recupère les auxquels il a participé
						$req6="select q.titleQz from quizzes as q, participate as p where p.idQz=q.idQz and p.login='".$login."'"; $reponse=mysql_query($req6) or die("echec requete");
					
						//affiche dans la liste le titre des quizs
						while($donnees = mysql_fetch_array($reponse,MYSQL_ASSOC))
						{
						?>
						<option value="<?php echo $donnees["titleQz"] ?>" > <?php echo $donnees["titleQz"]?> </option> <?php
						} ?>
						</select>
						<?php 
						
						//recupère les resultats de chaque quiz 
						$req5="select `quiz_result` from results where login='aly' group by `date_quiz`;";
						$result7=mysql_query($req5) or die("echec requete");
						
						//recupere les dates auquelles les quizs ont ete faits
						$req6="SELECT  distinct `date_quiz` FROM results WHERE login ='".$login."' GROUP BY  `quiz_result`;";
						$result6=mysql_query($req6) or die("echec requete");
						
						//recupération des contenus des tableaux (sortie des requetes)
						 $tab22=array();$tab33=array(); $i=0;
								while($don=mysql_fetch_array($result6,MYSQL_ASSOC))
								{
									$tab22[$i]=$don["date_quiz"];$i=$i+1;
								}
								while($done=mysql_fetch_array($result7,MYSQL_ASSOC))
								{
									$tab33[$i]=$done["quiz_result"];$i=$i+1;
								}
						
								echo '<script language="javascript">';
								echo 'tab6 = new Object();';
								echo 'tab6 = '.json_encode($tab22).';';
								echo '</script>';

								echo '<script language="javascript">';
								echo 'tab7 = new Object();';
								echo 'tab7 = '.json_encode($tab33).';';
								echo '</script>';
						// utilisation des fonctions javascript pour affichier le graphe correspondant ?>
						<input class="divdown" onclick="basic_line(tab6,tab7);" type="button" value="HISTORIQUE"/>
						</div>
						</section>
						<section id="widesection"></section>

					<?php
						include('../modules/footer.php');
					?> 
				</section>
		</section>

</body></html>