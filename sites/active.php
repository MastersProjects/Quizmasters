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
	$kontinent = $db->escape_string($_POST['kontinent']);
	$land = $db->escape_string($_POST['country']);
	$avatar = $db->escape_string($_POST['avatar']);
	$_SESSION = $db->escape_string($_POST['username']);
	
	/* --- Initialisierung der Variablen End --- */
	
	
	/* --- Query Start --- */
	
	//Profil-Daten werden neu eingelesen
	$abfrage = "UPDATE user SET Name='$nachname', Vorname='$vorname', Email='$email', 
				Kontinent='$kontinent', Land='$land' WHERE ID_Benutzername='$usernameactiv';";
	
	//Avatar wird neu definiert
	$sql_query = "UPDATE user SET Avatar = '$avatar' WHERE ID_Benutzername = '$username'";
	
	//Land wird gesetzt
	$sql_query_land = "UPDATE user SET Land = '$land' WHERE ID_Benutzername = '$username'";
	
	/* --- Query End --- */
	
	/* --- Query Ausführen Start --- */
	
	//Die Querys werden auf der DB ausgeführt
	
	//Query für Profil
	$rs_p = $db->query ( $abfrage );
	
	//Query für Avatar
	$rs = $db->query ( $sql_query );
	
	//Query für Land
	$rs_land = $db->query ( $sql_query_land );
	
	/* --- Query Ausführen End --- */
	
	/* --- Diverses Start --- */
	
	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);
	
	/* --- Diverses End --- */
	
	/* --- Weiterleitung falls es Erfolgreich ist --- */
	header("Location: /index.php?site=profile");//Leitet zu der Loginseite weiter mit den Attributen
?>