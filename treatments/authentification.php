<?php   
	require('../core/boot.php'); 

    /*On n'effectue les traitement qu'à la condition que les informations aient été effectivement postées*/
    if (isset($_POST) && (!empty($_POST['login'])) && (!empty($_POST['password']))) {

        extract($_POST);  

        // On va chercher le mot de passe afférent à ce login*/
		$sql = ("SELECT password FROM Users WHERE login = '".$login."'");
        $req = 	mysql_query($sql) or die ('ERREUR '.mysql_error()); 
         
        // On vérifie que l'utilisateur existe bien*/
        if (mysql_num_rows($req) > 0) {
			$data = mysql_fetch_assoc($req);
           $crypted = md5($password); 
		   
            // On vérifie que son mot de passe est correct
            if ($crypted == $data['password']) {
				// status et idP
				$sql = ("SELECT status, idP FROM Users WHERE login = '".$login."'");
				$req = 	mysql_query($sql) or die ('ERREUR '.mysql_error()); 
				$data = mysql_fetch_assoc($req);
				$idP = $data['idP'];
				$status = $data['status'];
				
				
				// firstname et lastname
				$sql = ("SELECT firstname, lastname FROM Profils WHERE idP = '".$idP."'");
				$req = 	mysql_query($sql) or die ('ERREUR '.mysql_error()); 
				$data = mysql_fetch_assoc($req);
				$firstname = $data['firstname'];
				$lastname = $data['lastname'];
				
                $_SESSION['login'] = $login;
				$_SESSION['firstname'] = $firstname;
				$_SESSION['lastname'] = $lastname;
				$_SESSION['status'] = $status;
				$_SESSION['idP'] = $idP;
		
				if ($status == 'admin')
					header('Location: ../pages/admin_homepage.php'); 
				
				else
					header('Location: ../pages/user_homepage.php'); 
            }
			
			else {
			echo "$crypted";
				header('Location: ../pages/error_pages/signIn_error.php'); 
			}
        }
		
		else {
			header('Location: ../pages/error_pages/signIn_error.php'); 
		}
    }
	
	else {
		header('Location: ../pages/error_pages/signIn_error.php'); 
	}

  