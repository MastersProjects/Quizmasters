<?php
	//session_start();
	$_SESSION ["logedin"] = false;
	//"logedin ist wichtig => Initialisieren!";
	
	$username = $_POST ['username'];
	$passwort = $_POST ['pw'];
	$mysqli = new mysqli ( "localhost", "root", "", "quizmaster", "3307" );
	$query = 'select * from user';
	$result = $mysqli->query ( $query );
	
	while ( $zeile = $result->fetch_array () ) { // Zeile für Zeile
		if (($zeile ['ID_Benutzername'] == $username) && ($zeile ['Passwort'] == md5 ( $passwort ))) {
			$_SESSION ["logedin"] = true;		
			break;
		}
	}
	
	if ($_SESSION ["logedin"]) {
		header ( "Location: index.php" );
	} 
	else {
		header ( "Location: fail1.php" );
	}
?>