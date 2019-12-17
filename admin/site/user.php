<?php
require_once ("ressources/database.php");

$query = "SELECT * FROM user";
$result = $db->query ( $query );

?>
<table>
	<tr>
		<th class="rankingplayer">Username</th>
		<th class="rankingplayer">Name</th>
		<th class="rankingplayer">Vorname</th>
		<th class="rankingplayer">Email</th>
		<th class="rankingplayer">Punkte</th>
		<th class="rankingplayer">Kontinent</th>
		<th class="rankingplayer">Land</th>
		<th class="rankingplayer">Avatar</th>
		<th class="rankingplayer">Rang</th>
		<th class="rankingplayer">Blocked</th>
	</tr>

<?php
while ( $row = $result->fetch_array () ) { // Anzahl Reihen ausgeben
	?>
			<tr>
		<!-- Lies die Infos aus der DB -->
		<td class="rankingplayer"><?php echo $row['ID_Benutzername'];?></td>
		<?php 
		$usernamefriend = $row['ID_Benutzername'];?>
		<!-- Ausgabe des Namen -->
		<td class="rankingplayer"><?php  echo $row['Name'];?></td>
		<!-- Ausgabe der Vorname -->
		<td class="rankingplayer"><?php echo $row['Vorname'];?></td>
		<!-- Ausgabe der Email -->
		<td class="rankingplayer"><?php echo $row['Email'];?></td>
		<!-- Ausgabe der Punkte -->
		<td class="rankingplayer"><?php echo $row['Punkte'];?></td>
		<!-- Ausgabe der Kontinente -->
		<td class="rankingplayer"><?php echo $row['Kontinent'];?></td>
		<!-- Ausgabe der Land -->
		<td class="rankingplayer"><?php echo $row['Land'];?></td>
		<!-- Ausgabe der Avatar -->
		<td class="rankingplayer"><?php echo $row['Avatar'];?></td>
		<!-- Ausgabe der Rang -->
		<td class="rankingplayer"><?php echo $row['Rang'];?></td>
		<!-- Ausgabe der Cheat funktion -->
		<td class="rankingplayer"><?php echo $row['Cheat'];?></td>
		<td><a class="link" href="?site=edit&user=<?php echo $usernamefriend ?>">[Bearbeiten]</a></td>
	</tr>
	<tr>
		<td><hr/></td>
		<td><hr/></td>
		<td><hr/></td>	
		<td><hr/></td>	
		<td><hr/></td>	
		<td><hr/></td>
		<td><hr/></td>
		<td><hr/></td>
		<td><hr/></td>
		<td><hr/></td>
		<td><hr/></td>
	</tr>	

<?php
}
?>
</table>