<?php 
require __DIR__.'/../config/config.php'; // load the configuration of the site
require __DIR__.'/class.php'; // load all the php class

// function to be connected to the database
function connexion_bdd(){
    try {
    	return new PDO('mysql:host='.BDD_HOST.';dbname='.BDD_NAME.';charset=utf8;', BDD_LOGIN, BDD_PASSWORD);
	} catch (PDOException $e) {
    	echo 'Connexion échouée : ' . $e->getMessage();
	}
}

// function to verify is the user have some permissions
function verify_permission($id_member, $status){
	if(isset($id_member) AND empty($id_member) === false AND isset($status) AND empty($status) === false){
		$id_member = intval($id_member);
		$status = intval($status);
		$bdd = connexion_bdd();
		$verify_user = $bdd->prepare('SELECT permission FROM list_members WHERE id = ?');
		$verify_user->execute(array($id_member));
		$user_info = $verify_user->fetch();
		if(intval($user_info['permission']) === $status){
			return true;
		} else {
			return false;
		}
	}
}

?>