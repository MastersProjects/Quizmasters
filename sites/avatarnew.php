<?php

/* --- File einlesen Start --- */
include ('../auth.php');
require_once ("../ressources/database.php");

/* --- File einlesen End --- */

/* --- Variablen definieren Start --- */

$avatar = $_GET ['avatar'];
$username = $_SESSION ['username'];

/* --- Variablen definieren End --- */

/* --- Query Start --- */

$sql_query = "UPDATE user SET Avatar = '$avatar' WHERE ID_Benutzername = '$username'";
$rs = $db->query ( $sql_query ); // Query auf DB ausführen

/* --- Query End --- */

if (! $db->error) { // Wenn kein DB Error auftritt, dann weiter zu profile.php
	header ( 'Location: ../profile.php' );
} else {
	echo ("Error!"); // Wenn DB Error auftritt, dann gib Error! aus
}
?>