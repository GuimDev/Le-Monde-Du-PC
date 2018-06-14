<?php
// file to log in and log out
// can log with the email or the login
require __DIR__.'/../../src/php/functions.php'; 
session_start();
maintenance_mode();

if(isset($_GET['action']) AND empty($_GET['action']) === false){
	$action = strval($_GET['action']);
	if($action === 'connexion'){ // connexion
		if(isset($_SESSION['user_connected']) AND empty($_SESSION['user_connected'])){ // if the user if already connected
			
		} else { // if the user if not already connected
			// connexion
			
		}
	} else if($action === 'deconnexion'){ // deconnexion
		
	} else { // error, not a valid parameter 
		
	}
} else { // error, no parameter or empty

}
?>