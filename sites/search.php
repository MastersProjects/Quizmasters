<?php
/* --- DB Verbindung und Auth Start --- */

require_once ("ressources/database.php");
$searchfield = $db->escape_string($_POST['searchfield']);

/* --- DB Verbindung und Auth End --- */

/* --- SQL Query Start ---*/

//Gibt alle Datens�tze aus in welcher der eingebenen Wert 
//in den Spalten Benutzername, Name, Vorname oder Land vorkommen
$query = "SELECT * FROM user where 
ID_Benutzername='$searchfield'  
or Land='$searchfield' 
ORDER BY Punkte DESC";

//Query wird auf der DB ausgef�hrt
$rs = $db->query ( $query ); 

/* --- SQL Query End --- */
?>

<!-- HTML START -->
<div id="center">
<h1>Suchergebnisse von "<?php echo htmlentities($searchfield) ?>"</h1>
	<table>
		<tr>
			<th class="rankingplayer">Username</th>
			<th class="rankingpoints">Punkte</th>
			<th class="rankingnation">Kontinent</th>
			<th class="rankingnation">Land</th>
		</tr>
<?php 
while ( $row = $rs->fetch_array () ) {
	?>
	
		<tr>
			<td class="rankingplayer"><a href="index.php?site=friend&user=<?php echo $row['ID_Benutzername'];?>"><?php echo $row['ID_Benutzername'];?></a></td> <!-- Liest den Benutzernamen aus der DB -->
			<td class="rankingpoints"><?php  echo $row['Punkte'];?></td> <!-- Liest die Punkte aus der DB -->
			<td class="rankingnation"><?php  echo $row['Kontinent']; ?></td> <!-- Liest der Kontinent aus von der DB -->
			<td class="rankingnation"><?php  echo $row['Land']; ?></td> <!-- Liest das Land aus der DB -->
		</tr>
	
<?php
}
?></table>
</div>
<div class="abstand"></div>
<!-- Zur�ck Button Start -->
<button onclick="goBack()">Zur&uuml;ck</button>
<script>
function goBack() {
    window.history.back()
}
</script>
<!-- Zur�ck Button End -->

<!-- HTML START -->