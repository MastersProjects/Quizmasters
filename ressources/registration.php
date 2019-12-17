<?php
require_once ("database.php");
session_start ();
$email = $db->escape_string ( addslashes ( $_POST ['email'] ) );
$vorname = $db->escape_string ( $_POST ['vorname'] );
$nachname = $db->escape_string ( $_POST ['nachname'] );
$username = $db->escape_string ( $_POST ['username'] );
$pw = $db->escape_string ( $_POST ['pw'] );
$kt = $db->escape_string ( $_POST ['country'] );

// $sql = "SELECT COUNT(ID_Benutzername) From user where ID_Benutzername = '$username'";
$sql = "SELECT ID_Benutzername From user";
$result = $db->query ( $sql );

while ( $zeile = $result->fetch_array () ) {
	if ($zeile ['ID_Benutzername'] == $username) {
		header ( 'Location: ../sites/fail2.php' );
	} elseif (($zeile ['ID_Benutzername'] != $username) && ($pw == $_POST ['pw2'])) {
		$abfrage = "INSERT INTO user (ID_Benutzername, Name, Vorname, Email, Passwort, Kontinent)
		    	VALUES ('" . $username . "', '" . $nachname . "', '" . $vorname . "', '" . $email . "', '" . md5 ( $pw ) . "', '" . $kt . "' )";
		$_SESSION ['username'] = $username;
		$_SESSION ['email'] = $email;
		$db->query ( $abfrage );
		
		if (!$db->error) {
			$_SESSION ['angemeldet'] = true;
			require_once("mailto.php");
			header ( 'Location: ../mainlogin.php?action=logout&site=registr' );
		} else {
			//header( "Location: ../sites/fail1.php" );
		}
	} 

	elseif (($zeile ['ID_Benutzername'] != $username) && ($pw != $_POST ['pw2'])) {
		header ( "Location: ../sites/fail3.php" );
	}
}
?>