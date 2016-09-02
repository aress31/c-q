<section class="center_content">
	<hr width = "95%" size = "1" color = "#B52025"/><br>

	<article class="friends_left_content">
		<h1>Friends</h1><br><br>
		

		
			
				<?php
					$login = $_SESSION['login'];
					$requete = mysql_query("SELECT * FROM users, profils, as_friend WHERE users.idP = profils.idP AND as_friend.login_friend = users.login AND (as_friend.login LIKE '$login')") or die(mysql_error());
					$rows = mysql_num_rows($requete);
					$nb_friend_waiting = 0;
					if($rows != 0){
						//mysql_fetch_array — Retourne une ligne de résultat MySQL sous la forme d'un tableau associatif, d'un tableau indexé, ou les deux
						while($donnees = mysql_fetch_array($requete)) // on fait un while pour afficher la liste des fonctions trouvées
						{
							if($donnees['friend_acc'] == 'y'){
								?>
								<div class="friend">
								<img src="../design/images/profile_photo_df.jpg" alt="" title="" class="friends_avatar_icon" border="0">
								<h3><?php echo $donnees['firstname']." "; echo $donnees['lastname'];?></h3>
								<img src="../design/images/enveloppe.jpg" alt="" title="" class="friends_envelope_icon" border="0">
								<a href="mailto:<?php echo $donnees['email']; ?>" style="TEXT-DECORATION : none;"><h4>Send message</h4></a>
								
								<?php
								if($donnees['online_offline'] == '1'){
								?>
									<img src="../design/images/voyant_vert.png" alt="" title="" class="friends_blink_icon" border="0">
									<h5>Online</h5>
									</div>
								<?php
								}
								
								if($donnees['online_offline'] == '0'){
								?>
									<img src="../design/images/voyant_rouge.png" alt="" title="" class="friends_blink_icon" border="0">
									<h5>Offline</h5>
									</div>
								<?php
								}
							} 
							
							if($donnees['friend_acc'] == 'n'){
								$nb_friend_waiting += 1;
								?>
								<div class="friend">
								<img src="../design/images/profile_photo_df.jpg" alt="" title="" class="friends_avatar_icon" border="0">
								<h3><?php echo $donnees['firstname']." "; echo $donnees['lastname'];?></h3>
								<a href="../modules/accept_request_add_friend.php?login_friend=<?php echo $donnees['login_friend'] ?>" style="TEXT-DECORATION : none;">Accepter | </a>
								<a href="../modules/refuse_request_add_friend.php?login_friend=<?php echo $donnees['login_friend'] ?>" style="TEXT-DECORATION : none;">Refuser</a>
								</div>
								<?php					
							}
														
								
						}
					}
						
		if($nb_friend_waiting != 0){
		?>
		<div class="info_bulle">
			<div class="nb_friend_waiting">
			<?php
				echo $nb_friend_waiting;
			?>
			</div>
		</div>
		<?php

								}
	?>
				

		</div>
	</article>
	
	
	<div class="vertical_separation"></div>
	<article class="friends_right_content">
		<h1 id="add">Add new friend</h1><br><br>
		<form action="friends.php" method="post">
		<input type="search" class="search_field" name="search" />
		<input type="submit" value="Search" name="submit"/></br></br></br>
	</article>

	
	
	
	<?php
		//On determine l'expression à rechercher
		if(isset($_POST['submit']) &&  $_POST['search']!= NULL)	/*Si l'utilisateur clique sur le bouton Search et que le champ n'est pas vide*/
		{
				$search = htmlspecialchars($_POST['search']);
				$requete = mysql_query("SELECT * FROM users, profils WHERE users.idP = profils.idP AND (login LIKE '%$search%' OR firstname LIKE '%$search%' OR lastname LIKE '%$search%')") or die(mysql_error());
				$rows = mysql_num_rows($requete);
				if($rows != 0){
				
					//mysql_fetch_array — Retourne une ligne de résultat MySQL sous la forme d'un tableau associatif, d'un tableau indexé, ou les deux
					while($donnees = mysql_fetch_array($requete)) // on fait un while pour afficher la liste des fonctions trouvées
					{
						?>
						<img src="../design/images/profile_photo_df.jpg" alt="" title="" class="friends_avatar_icon_search" border="0">
						<h3><?php echo $donnees['firstname']." "; echo $donnees['lastname'];?></h3>
						<img src="../design/images/enveloppe.jpg" alt="" title="" class="friends_envelope_icon" border="0">
						<a href="mailto:<?php echo $donnees['email']; ?>" style="TEXT-DECORATION : none;"><h4>Send message</h4></a>
						<img src="../design/images/ajouter_ami.png" alt="" title="" class="friends_blink_icon" border="0">
						<a href="../modules/envoi_request_add_friend.php?login_friend=<?php echo $donnees['login'] ?>" style="TEXT-DECORATION : none;"><h5>Add friend</h5></a>
						</br></br>
						<?php
					}
				}
				else{
					echo "Pas de resultats pour votre recherche";
				}
		}
		else
		{
			echo "Veuillez saisir une recherche.";
		}
	

		/*
		$and="";
		$search = preg_split('/[\s]+/',$search);
		$total_resultat = count($search);
		
		foreach($search as $key=>$searches)
		{
			$and .= "LIKE '%$searches%'";
			if($key != ($total_resultat-1))
			{
				$and .= "AND ";
			}
		}
		
		$requete = mysql_query("SELECT * FROM users, profils WHERE login $and OR lastname $and OR firstname $and");
		$rows = mysql_num_rows($requete);
		
		if($rows != 0){
			while($row = mysql_fetch_assoc($requete)){
				echo $row['login'];
			}
		}else{
			echo"Pas de résultats pour votre recherche".$searches;
		}
		*/
		
	?>


</section>