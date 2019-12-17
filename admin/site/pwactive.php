<?php
require_once ("../ressources/database.php");

$username = $db->escape_string ( $_POST ['username'] );
$pw = $db->escape_string ( $_POST ['pw'] );
$pw2 = $db->escape_string ( $_POST ['pw2'] );

if ($pw == $pw2) {
	$abfrage = "UPDATE user SET Passwort='" . md5($pw) . "' WHERE ID_Benutzername='" . $username . "';";
	$rs = $db->query ( $abfrage );
	header("Location: ../index.php?site=user");
} else {
	header("Location: ../index.php?site=pwfail");
	echo("ERROR");
}

?>