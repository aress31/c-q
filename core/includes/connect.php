<?php
    // Déclaration des variables
	$serveur = "127.0.0.1";
	$base_name = "C&Q";
	$login = "root";
	$password = ""; 
	
	// On se connecte à MySQL
    $database = mysql_connect ($serveur, $login, $password) 
	or die ('ERREUR '.mysql_error()); 

    // On sélectionne la DB
    mysql_select_db($base_name, $database); 