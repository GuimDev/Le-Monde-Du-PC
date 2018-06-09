<?php 
require __DIR__.'/../config/config.php'; // load the configuration of the site
require __DIR__.'/class.php'; // load all the php class

// function to be connected to the database
function connexion_bdd(){  
    try {
    	return new PDO('mysql:host='.BDD_HOST.';dbname='.BDD_NAME.';charset=utf8', BDD_LOGIN, BDD_MDP);
	} catch (PDOException $e) {
    	echo 'Connexion échouée : ' . $e->getMessage();
	}
}

?>