<?php
//Hier wird überprüft ob man schon angemeldet ist, sonst wird man weitergeleitet auf mainlogin.php
session_start();
require_once("../ressources/database.php");

if(isset($_GET['action']) && $_GET['action'] == "logout"){
       session_destroy();
       header("location: mainlogin.php");
}

//if ($_SERVER['REQUEST_METHOD'] == 'POST') {

if(isset($_POST['username'])){

       $username = $db->escape_string($_POST['username']);
       $passwort = $db->escape_string($_POST['pw']);

       $hostname = $_SERVER['HTTP_HOST'];
       $path = dirname($_SERVER['PHP_SELF']);

       // Benutzername und Passwort werden überprüft
       $query = 'select * from admin';
       $result = $db->query($query);
       while($zeile = $result->fetch_array()){
             if(($zeile['ID_Benutzername']==$username) && ($zeile['Passwort']==md5($passwort))) {
                    $_SESSION['angemeldet'] = true;
                    $_SESSION['username'] = $zeile['ID_Benutzername'];
                    header('Location: index.php');
                    exit;
             }
             else {
                    header("Location: site/fail1.php");
             }
       }
}

?>