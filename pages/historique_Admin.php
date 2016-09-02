<?php   
	require('../core/boot.php');
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>Historique</title>
                <link rel="shortcut icon" href="../design/images/logoicon.ico" type="image/x-icon" />
             
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
						<h2>COURSES</h2><br /><br /><br />
						<div class="divpart" >
						<h3>Nonber of Access by Courses</h3><br /><br />
						
						<?php 	
						$login=$_SESSION['login'];
								//recupère le nombre d'accès de chaque lessons créé par user 
								$req="select distinct lessons.nbAccess from Parts as p,Users as u,lessons 
										where u.login='".$login."' and p.login=u.login and lessons.Idl=p.Idl"; 
								$tab2=mysql_query($req) or die("echec requete");
								
								//recupère le titre de toutes les lessons creées par user
								$req1="select lessons.titleL from lessons where lessons.nbAccess in(select distinct lessons.nbAccess from Parts as p,Users as u,lessons
										where u.login='".$login."' and p.login=u.login and lessons.Idl=p.Idl);"; 
								$tab1=mysql_query($req1) or die("echec requete");
								?>
							<?php
							//recupération des contenus des tableaux (sortie des requetes)
								$tab22=array(); $tab11=array(); $i=0;
								while($don=mysql_fetch_array($tab1,MYSQL_ASSOC))
								{
									$tab11[$i]=$don["titleL"];$i=$i+1;
								}
								while($done=mysql_fetch_array($tab2,MYSQL_ASSOC))
								{
									$tab22[$i]=$done["nbAccess"]; $i=$i+1;
								}	
								
								//convertion de tableau de php à javascript
								echo '<script language="javascript">';
								echo 'tab1 = new Object();';
								echo 'tab1 = '.json_encode($tab11).';';
								echo '</script>';

								echo '<script language="javascript">';
								echo 'tab2 = new Object();';
								echo 'tab2 = '.json_encode($tab22).';';
								echo '</script>';
								
								
								// utilisation des fonctions javascript pour affichier le graphe?>
								<a onclick="basic_line(tab1,tab2);"><img class="icon_left" src="../design/images/barChart.jpg" alt="" title="" border="0"></a>
								<a onclick="basic_bar(tab1,tab2);"><img class="icon_right" src="../design/images/Line Chart.ico" alt="" title="" border="0"></a>
								
						</div>
						<div class="divpart"><br />
						<h3>Nonber of Access by date</h3>
						<select name="date" class="divdown">
						<?php 
						
						// recupère le titre de toutes les lessons creées par user
						$req1="select lessons.titleL from lessons where lessons.nbAccess in(select distinct lessons.nbAccess from Parts as p,Users as u,lessons
										where u.login='".$login."' and p.login=u.login and lessons.Idl=p.Idl);"; 
						$tabb=mysql_query($req1) or die("echec requete");
						
						//affichage dans la liste du titre des lessons créés par le user
						while($donnees = mysql_fetch_array($tabb,MYSQL_ASSOC))
						{
						?>
							<option value="<?php echo $donnees["titleL"] ?>" > <?php echo $donnees["titleL"]?> </option> <?php 
						} ?>
						<input class="divdown" onclick="basic_line(tab2,tab1);" type="button" value="HISTORIQUE" />
						</select>
						
						
						</div>
						</section>
						<section id="right" class="part">
						<h2>QUIZZES</h2><br /><br /><br />
						<div class="divpart">
						<h3>Nonber of Participate by Quiz</h3><br /><br />
												<?php 	
								
								// on recupere tous les id de quiz creer par user x
								$req3="select idQz from quizzes as q,users as u where u.login='".$login."' and u.login=q.login
								order by idQz asc;"; $tab41=mysql_query($req3) or die("echec requete");
								
								// compte le nombre de participant pour chaque quiz
								$req4="SELECT quizzes.idQz,COUNT(participate.idQz) AS Numbers FROM participate LEFT JOIN Quizzes ON participate.idQz=quizzes.idQz GROUP BY quizzes.idQz;";
								$result=mysql_query($req4) or die("echec requete");
								
								// recupere le titres de quiz que le user a creé
								$req5="select titleQz from quizzes as q,users as u where u.login='".$login."' and u.login=q.login order by titleQz asc;"; 
								$tab3=mysql_query($req5) or die("echec requete");
								
								$i=0; $tab4=array();
								
								//recupération du nombre de participant correspondant aux quiz crées par le user
								while($donnees = mysql_fetch_array($tab41,MYSQL_ASSOC))
								{
									while($stok= mysql_fetch_array($result,MYSQL_ASSOC))
									{
										if($donnees["idQz"]==$stok["idQz"])
										{
											$tab4[$i]=$stok["Numbers"]; $i=$i+1;
										}
									}
								}
								
								$tab33=array(); $tab=array(); $i=0;
								
								//recupération des contenus des tableaux (sortie des requetes)
								while($don=mysql_fetch_array($tab1,MYSQL_ASSOC))
								{
									$tab33[$i]=$don["titleQz"];$i=$i+1;
								}
								
								//convertion de tableau de php à javascript
								echo '<script language="javascript">';
								echo 'tab3 = new Object();';
								echo 'tab3 = '.json_encode($tab33).';';
								echo '</script>';

								echo '<script language="javascript">';
								echo 'tab4 = new Object();';
								echo 'tab4 = '.json_encode($tab4).';';
								echo '</script>';
								// utilisation des fonctions javascript pour affichier le graphe ?>
								<a onclick="basic_bar(tab4,tab3);"><img class="icon_left" src="../design/images/barChart.jpg" alt="" title="" border="0"></a>
								<a onclick="basic_line(tab4,tab3);"><img class="icon_right" src="../design/images/Line Chart.ico" alt="" title="" border="0"></a>
						</div>
						<div class="divpart"><br />
						<h3>Nonber of Participate by date</h3>
						<select name="month" class="divdown">
						 
						<?php 
						//recupère le titre des quiz crées par le user
						$req6="select titleQz from quizzes as q,users as u where u.login='".$login."' and u.login=q.login order by titleQz asc;"; 
						$reponse6=mysql_query($req6) or die("echec requete");
						
						// recupère le nombre de participants par date
						$req2="select participate_d, count(*) as NbreP from participate group by participate_d order by participate_d asc;";
						$reponse2=mysql_query($req2) or die("echec requete");
						
						//affichage sur dans la liste du titre des quiz créés par le user
						while($donnees = mysql_fetch_array($reponse6,MYSQL_ASSOC))
						{
						?>
						<option value="<?php echo $donnees["titleQz"] ?>" > <?php echo $donnees["titleQz"]?> </option> <?php
						} 
						
						$i=0; $tab5=array();$tab6=array();
						
								//stokage dans les tableaux des date de participation et du nombre de participant
								while($donne = mysql_fetch_array($reponse2,MYSQL_ASSOC))
								{
									 $tab5[$i]=$donne["participate_d"]; 
									 $tab6[$i]=$donne["NbreP"];
									 $i=$i+1;
								}
								
								
								echo '<script language="javascript">';
								echo 'tab5 = new Object();';
								echo 'tab5 = '.json_encode($tab5).';';
								echo '</script>';

								echo '<script language="javascript">';
								echo 'tab6 = new Object();';
								echo 'tab6 = '.json_encode($tab6).';';
								echo '</script>';
								// utilisation des fonctions javascript pour affichier le graphe correspondant ?>
						
						<input class="divdown" onclick="basic_line(tab5,tab6);" type="button" value="HISTORIQUE" />
						</select>
						
						</div>
						</section>
						<section id="widesection"></section>
					
					<?php //inclusion du pied de page
						include('../modules/footer.php');
					?> 
				</section>
		</section>

</body></html>