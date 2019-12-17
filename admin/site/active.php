<?php
	/* --- Datenbank-Verbindung und Session Überprüfung Start --- */
	
	require_once ("../ressources/database.php"); //Datenbank-Verbindung
	
	/* --- Datenbank-Verbindung und Session Überprüfung End --- */
	
	
	/* --- Initialisierung der Variablen Start --- */
	
	$usernameactiv = $db->escape_string($_POST['origname']); // Session Username
	$email = $db->escape_string($_POST['email']);
	$vorname = $db->escape_string($_POST['vorname']);
	$nachname = $db->escape_string($_POST['nachname']);
	$username = $db->escape_string($_POST['username']);
	$cheat = $db->escape_string($_POST['cheat']);
	$rang = $db->escape_string($_POST['rang']);
	$punkte = $db->escape_string($_POST['punkte']);
	$kontinent = $db->escape_string($_POST['kontinent']);
	$land = $db->escape_string($_POST['country']);
	$_SESSION = $db->escape_string($_POST['username']);
	
	/* --- Initialisierung der Variablen End --- */
	
	
	/* --- Query Start --- */
	
	//Profil-Daten werden neu eingelesen
	$abfrage = "UPDATE user SET Name='$nachname', Vorname='$vorname', Email='$email', ID_Benutzername='$username', Punkte='$punkte', Rang='$rang', Cheat='$cheat', 
				Kontinent='$kontinent', Land='$land' WHERE ID_Benutzername='$usernameactiv';";
	
	/* --- Query End --- */
	
	/* --- Query Ausführen Start --- */
	
	//Die Querys werden auf der DB ausgeführt
	
	//Query für Profil
	$rs_p = $db->query ( $abfrage );
		
	/* --- Query Ausführen End --- */
	
	/* --- Diverses Start --- */
	
	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);
	
	/* --- Diverses End --- */
	
	/* --- Weiterleitung falls es Erfolgreich ist --- */
	header("Location: ../index.php?site=user");//Leitet zu der Loginseite weiter mit den Attributen
?>