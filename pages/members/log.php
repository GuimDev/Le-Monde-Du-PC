<?php
// file to log in and log out
// can log with the email or the login
require __DIR__.'/../../src/php/functions.php'; 
session_start();
maintenance_mode();

if(isset($_GET['action']) AND empty($_GET['action']) === false){
	$action = strval($_GET['action']);
	if(isset($_SESSION['user_connected']) AND empty($_SESSION['user_connected'])){ // if the user is already connected
		if($action === 'deconnexion'){ // deconnexion
			$_SESSION = array();
			if(ini_get('session.use_cookies')){ // destroy all the session
				$params = session_get_cookie_params();
    			setcookie(session_name(), '', time() - 42000,
        			$params['path'], $params['domain'],
        			$params['secure'], $params['httponly']
    			);
			}
		} else { // redirection

		}
	} else { 
		if($action === 'connexion'){ // connexion

		} else { // error, not a good parameter

		}
	}
} else { // error, no parameter or empty parameter

}
?>