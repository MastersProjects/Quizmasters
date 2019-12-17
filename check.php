<?php
// Hier wird ¸berpr¸ft ob man schon angemeldet ist, sonst wird man weitergeleitet auf mainlogin.php

session_start ();
require_once ("ressources/database.php");

if (isset ( $_GET ['action'] ) && $_GET ['action'] == "logout") {
       session_destroy ();
       header ( "location: mainlogin.php" );
}

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

if (isset ( $_POST ['username'] )) {
       $username = $db->escape_string ( $_POST ['username'] );
       $passwort = $db->escape_string ( $_POST ['pw'] );
       
       $hostname = $_SERVER ['HTTP_HOST'];
       $path = dirname ( $_SERVER ['PHP_SELF'] );
}      
       // Benutzername und Passwort werden empfangen
       
       /* --- Query Start --- */
       
       $query = "select * from user where ID_Benutzername = '" . $username . "';";
       $result = $db->query ( $query );
       
       /* --- Query End --- */

/* --- Session Variable setzen Start --- */

/* --- Session Variable satzen End --- */

while ( $zeile = $result->fetch_array () ) {
       $cheat = $zeile ['Cheat'];
       $username_check = $zeile['ID_Benutzername'];
       $pw_check = $zeile['Passwort'];
       if ($cheat == "Nein") {
             if (($username_check == $username) && ($pw_check == md5 ( $passwort ))) {
                    $_SESSION ['angemeldet'] = true;
                    $_SESSION ['username'] = $zeile ['ID_Benutzername'];
                    header ( 'Location: index.php' );
                    exit ();
             } else {
                    header ( "Location: sites/fail1.php" );
             }
             
             
       } else if ($cheat == "Ja") {
             header ( "Location: mainlogin.php?site=warning" );
       } else {
             echo ("Datenbank Error!");
       }
}

?>
