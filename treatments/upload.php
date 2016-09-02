<?php 
 require('../core/boot.php'); 

    /*On n'effectue les traitement qu'à la condition que les informations aient été effectivement postées*/
    if (isset($_POST) && (!empty($_POST['part_title'])) && (!empty($_POST['lesson_title'])))  {
   
		extract($_POST);  
  
		$lesson_title = mysql_real_escape_string($lesson_titile);
		$part_title = mysql_real_escape_string($part_titile);  
  
				
		if ($_FILES['my_file']['size'] > $max_file_size) {
			$error = "Le fichier est trop gros";
			echo $error;
		}
			
			
		else if ($_FILES['my_file']['error'] > 0) {
			$error = "An error  occured while the transfert";
			echo $error;
		}
		
		 else {
		
			$login = $_SESSION['login'];
					
			$valide_extension = array('pdf');
			$upload_extension = strtolower(substr(strrchr($_FILES['my_file']['name'], '.')  ,1));
				
			if ( in_array($upload_extension,$valide_extension) ) {

				
				$folder_name = "../courses/{$login}/{$lesson_title}";
				
				if (is_dir($folder_name)) {
					
					$resultat = move_uploaded_file($_FILES['my_file']['tmp_name'], "{$folder_name }/{$part_title}.pdf");
					
					if ($resultat)  {
					//INSERTION DANS LA BD DES INFORMATIONS RELATIFS AUX PARTS
					$sql = ('SELECT IdL FROM Lessons WHERE titleL = "'.$lesson_title.'"');
										
					$req = mysql_query($sql) or die(mysql_error()) ;
					
					$data = mysql_fetch_assoc($req) or die(mysql_error()) ;
					$idl = $data['IdL'];
					
					$date = date("Y-m-d H:i:s");
				
					$sql = ('INSERT  INTO Parts (idL, titlePart, login, post_date_A) VALUES ("'.$idl.'","'.$part_title.'","'.$login.'","'.$date.'")');
					$req = mysql_query($sql)  or die(mysql_error());
						
					header('Location: ../pages/my_courses.php'); 
					}
				}
				
					
				else {
					   
					mkdir($folder_name, 0777, true);
					$resultat = move_uploaded_file($_FILES['my_file']['tmp_name'], "{$folder_name }/{$part_title}.pdf");

					if ($resultat)  {
						//INSERTION DANS LA BD DES INFORMATIONS RELATIFS AUX PARTS
					$sql = ('SELECT IdL FROM Lessons WHERE titleL = "'.$lesson_title.'"');
					$req = mysql_query($sql) or die(mysql_error()) ;
					
					$data = mysql_fetch_assoc($req) or die(mysql_error()) ;
					$idl = $data['IdL'];
					
					$date = date("Y-m-d H:i:s");
					
					$sql = ('INSERT  INTO Parts (idL, titlePart, login, post_date_A) VALUES ("'.$idl.'","'.$part_title.'","'.$login.'","'.$date.'")');
					$req = mysql_query($sql)  or die(mysql_error());
					
					header('Location: ../pages/my_courses.php'); 
					}	
		     	}
			}
			
			else {
				echo "uncorrect extension";
			}
		}
	}
	
	
	
	
	else {
				echo "you must fill all field";
	}