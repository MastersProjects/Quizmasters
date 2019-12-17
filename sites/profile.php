<?php

/* --- File einlesen Start --- */
include ("quizauth.php");
require_once ("ressources/database.php");

/* --- File einlesen End --- */

/* --- Variablen zuweisen Start --- */

$username = $_SESSION ['username'];
$qy_user = "SELECT * FROM user WHERE ID_Benutzername =  '$username'";
$rs = $db->query ( $qy_user );
$row = $rs->fetch_array ();
$avatar = $row ['Avatar']
/* --- Variablen zuweisen End --- */
?>

<p class="titel">Dein Profil:</p>
<div id="left_pro">
	<table>
		<tr>
			<!-- Username auslesen -->
			<td>Username:</td>
			<td><?php echo $row['ID_Benutzername']?></td>
		</tr>

		<tr>
			<!-- Vorname auslesen -->
			<td>Nachname:</td>
			<td><?php echo $row['Vorname'];?></td>
		</tr>

		<tr>
			<!-- Nachname auslesen -->
			<td>Vorname:</td>
			<td><?php echo $row['Name'];?></td>
		</tr>

		<tr>
			<!-- Email auslesen -->
			<td>E-Mail:</td>
			<td><?php echo $row['Email'];?></td>
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
<div id="edit">
	<input type="button" value="Profil bearbeiten" onclick="location='?site=edit'">
	&nbsp;
	&nbsp;
	<input type="button" value="Passwort &auml;ndern" onclick="location='?site=pwedit'">
</div>






