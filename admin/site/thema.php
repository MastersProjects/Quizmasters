<?php 
require_once("ressources/database.php");

$query = "SELECT * FROM thema";
$result = $db->query($query);
?>
<table>
			<tr>
				<th class="ranking">ID</th>
				<th class="rankingplayer">Thema Name</th>
			</tr>

<?php 
while ( $row = $result->fetch_array () ) { // Anzahl Reihen ausgeben
	?>
		<tr>
				<!-- Lies die Infos aus der DB -->
				<td class="rankingplayer"><?php echo $row['ID_Thema'];?></td>
				<!-- Ausgabe des Usernamen -->
				<td class="rankingpoints"><a href="?site=quiz&name=<?php  echo $row['Name'];?>"><?php  echo $row['Name'];?></a></td>
				<!-- Ausgabe der Anzahl Punkte -->
			</tr>
<?php
}
?>
</table>
