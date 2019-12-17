<?php

/* --- File einlesen Start --- */
include ('quizauth.php');
require_once ("ressources/database.php");

/* --- File einlesen End --- */

/* --- Variable zuweisen Start und Query Start--- */

$username = $_SESSION ['username'];
$qy_user = "SELECT * FROM user WHERE ID_Benutzername =  '$username'";
$rs = $db->query ( $qy_user );
$row = $rs->fetch_array ();
$avatar = $row ['Avatar']
			
/* --- Variable zuweisen End und Query End--- */
	
?>

<p class="welcome">Dein Profil:</p>

<div id="left_ava">
	<table>

		<tr>
			<td>Avatar:</td>
		</tr>

		<tr>
			<!-- Avatar auslesen -->
			<td><?php echo '<img src="img/avatar/' . $avatar . '"/>' ?></td>
			<td></td>
			<td><a href="profile/avatar.php">[Bearbeiten]</a></td>
		</tr>

		<tr>
			<!-- Username auslesen -->
			<td>Username:</td>
			<td><?php echo $row['ID_Benutzername']?></td>
			<td><a href="profile/user.php">[Bearbeiten]</a></td>
		</tr>

		<tr>
			<!-- Punkte auslesen -->
			<td>Punkte:</td>
			<td><?php echo $row['Punkte'];?></td>
			<td><a href="profile/punkte.php">[Bearbeiten]</a></td>
		</tr>

		<tr>
			<!-- Nachname auslesen -->
			<td>Nachname:</td>
			<td><?php echo $row['Name'];?></td>
			<td><a href="profile/name.php">[Bearbeiten]</a></td>
		</tr>

		<tr>
			<!-- Vorname auslesen -->
			<td>Vorname:</td>
			<td><?php echo $row['Vorname'];?></td>
			<td><a href="profile/vname.php">[Bearbeiten]</a></td>
		</tr>

		<tr>
			<!-- Email auslesen -->
			<td>E-Mail:</td>
			<td><?php echo $row['Email'];?></td>
			<td><a href="profile/email.php">[Bearbeiten]</a></td>
		</tr>

		<tr>
			<!-- Kontinent auslesen -->
			<td>Kontinent:</td>
			<td><?php echo $row['Kontinent'];?></td>
			<td><a href="profile/kontinent.php">[Bearbeiten]</a></td>
		</tr>

		<tr>
			<!-- Land auslesen -->
			<td>Land:</td>
			<td><?php echo $row['Land'];?></td>
			<td><a href="profile/land.php">[Bearbeiten]</a></td>
		</tr>
	</table>
</div>

<!-- Avatar Auswahl -->
<div id=right_ava">
	<div id="ava_short_left">
		<img src="img/avatar/ava01.jpg" alt=bild "/> <input type="radio"
			name="Zahlmethode" value="Mastercard"><br> <img
			src="img/avatar/ava02.jpg" alt=bild "/> <input type="radio"
			name="Zahlmethode" value="Mastercard"><br> <img
			src="img/avatar/ava03.jpg" alt=bild "/> <input type="radio"
			name="Zahlmethode" value="Mastercard"><br>
	</div>
	<div id="ava_short_left">
		<img src="img/avatar/ava04.jpg" alt=bild "/> <input type="radio"
			name="Zahlmethode" value="Mastercard"><br> <img
			src="img/avatar/ava05.jpg" alt=bild "/> <input type="radio"
			name="Zahlmethode" value="Mastercard"><br> <img
			src="img/avatar/ava06.jpg" alt=bild "/> <input type="radio"
			name="Zahlmethode" value="Mastercard"><br> <img
			src="img/avatar/ava07.jpg" alt=bild "/> <input type="radio"
			name="Zahlmethode" value="Mastercard"><br>
	</div>
</div>
<p class="break"></p>
