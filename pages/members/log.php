<?php
// file to log in and log out
// can log with the email or the login
require __DIR__.'/src/php/functions.php'; 
session_start();
maintenance_mode();
if(isset($_SESSION['id'])){

} else {
	
}

?>