<?php

/* --- Datenbankverbindung laden Start --- */
require_once ("../ressources/database.php");

/* --- Datenbankverbindung laden End --- */

/* --- Variablen zuweisen Start --- */

$delete = $_POST ['delete'];
$username = $_POST ['originalname'];

/* --- Variablen zuweisen End --- */

/* --- Benutzerlöschen mit DB Query Start --- */

if ($delete == "JA" || $delete == "ja" || $delete == "Ja" || $delete == "jA") {
	$query = "DELETE FROM user WHERE ID_Benutzername = '$username'";
	$query2 = "DELETE FROM geloest WHERE Benutzer_ID = '$username'";
	$loeschen = $db->query ( $query );
	$loeschen2 = $db->query ( $query2 );
	header ( "Location: ../index.php?site=user" );
} else {
	header ( "Location: ../index.php?site=profile");
}

/* --- Benutzerlöschen mit DB Query End --- */

?>