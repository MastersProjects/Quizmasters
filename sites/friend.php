<?php

/* --- File einlesen Start --- */
include ("quizauth.php");
require_once ("ressources/database.php");

/* --- File einlesen End --- */

/* --- Variablen zuweisen Start --- */
$friend = $_GET['user'];
$username = $_SESSION ['username'];
$qy_user = "SELECT * FROM user WHERE ID_Benutzername =  '$friend'";
$rs = $db->query ( $qy_user );
$row = $rs->fetch_array ();
$avatar = $row ['Avatar'];
/* --- Variablen zuweisen End --- */
?>

<p class="titel"><?php echo $friend ?> sein Profil:</p>
<div id="left_pro">
	<table>
		<tr>
			<!-- Username auslesen -->
			<td>Username:</td>
			<td><?php echo $row['ID_Benutzername']?></td>
		</tr>

		<tr>
			<!-- Kontinent auslesen -->
			<td>Kontinent:</td>
			<td><?php echo $row['Kontinent'];?></td>
		</tr>

		<tr>
			<!-- Land auslesen -->
			<td>Land:</td>
			<td><?php echo $row['Land'];?></td>
		</tr>
	</table>
</div>
<div id="right_pro">
	<tr>
		<!-- Avatar auslesen -->
		<td>Avatar:</td>
		<table>

			<tr>
				<td id="avatar_img"><?php echo '<img src="img/avatar/' . $avatar . '"/>' ?></td>
				<td></td>
			</tr>
			<tr id="points">
				<td>Punkte:</td>
				<td><?php echo $row['Punkte'];?></td>
			</tr>
			<tr id="points">
				<td>Rang:</td>
				<td><?php echo $row['Rang'];?></td>
			</tr>
		</table>
</div>
<input type="button" value="Zur&uuml;ck" id="username" onclick="location='?site=rangliste'">
<div class="abstand"></div>






