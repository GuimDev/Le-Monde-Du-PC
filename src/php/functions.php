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
function verify_permission($id_member, $status, $token_get, $token_purpose){
	if(isset($id_member) AND empty($id_member) === false AND isset($status) AND empty($status) === false){
		if(isset($token_get) AND empty($token_get) === false AND isset($token_purpose) AND empty($token_purpose)){
			$id_member = intval($id_member);
			$status = intval($status);
			$token_get = strval($token_get);
			$token_purpose = strval($token_purpose);
			$bdd = connexion_bdd();
			$verify_user = $bdd->prepare('SELECT permission FROM list_members WHERE id = ?');
			$verify_user->execute(array($id_member));
			$user_info = $verify_user->fetch();
			if(intval($user_info['permission']) === $status AND $token_get === $token_purpose){
				return true;
			} else {
				return false;
			}
		}
	}
}

// function to get the real ip
function get_ip() {
    if(isset($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if(isset($_SERVER['REMOTE_ADDR'])) {
    	return $_SERVER['REMOTE_ADDR'];
    } else {
    	return '';
    }
}

// function to verify is the maintenance mode is active
function maintenance_mode(){
	$bdd = connexion_bdd();
    $maintenance = $bdd->query('SELECT ip, maintenance_mode FROM administration_options');
    $maintenance = $maintenance->fetch();
    if(intval($maintenance['maintenance_mode']) === 1 AND get_ip() !== $maintenance['ip']){
        exit('
            <!DOCTYPE html>
				<html>
    				<head>
        				<title>Site en maintenance - Le Monde Du PC</title>
        				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        				<meta name="viewport" content="width=device-width, initial-scale=1" />
        				<style type="text/css">
            				body { text-align: center; padding: 10%; font: 20px Helvetica, sans-serif; color: #333; }
            				h1 { font-size: 30px; margin: 0; }
            				article { display: block; text-align: left; max-width: 650px; margin: 0 auto; }
            				.signature { color: #dc8100; }
        				</style>
    				</head>
    			<body>
        			<article>
            			<h1>Site temporairement inaccessible !</h1>
            			<p>Une maintenance est acutellement en cours. Revenez bientôt.</p>
            			<p>Nous nous excusons pour tout inconvénient.</p>
            			<p>&mdash; <span class="signature">Le Monde Du PC</span></p>
        			</article>
    			</body>
			</html>
        '); 
    }
}

?>