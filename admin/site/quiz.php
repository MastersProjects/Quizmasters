<?php 
require_once("ressources/database.php");

if ($_GET['name'] == "Sport") {
	$query = "SELECT * FROM quiz WHERE Thema_ID = '1'";
	$result = $db->query($query);
} else if ($_GET['name'] == "Tiere") {
	$query2 = "SELECT * FROM quiz WHERE Thema_ID = '2'";
	$result = $db->query($query2);
} else if ($_GET['name'] == "Games") {
	$query3 = "SELECT * FROM quiz WHERE Thema_ID = '3'";
	$result = $db->query($query3);
} else if ($_GET['name'] == "Geografie") {
	$query4 = "SELECT * FROM quiz WHERE Thema_ID = '4'";
	$result = $db->query($query4);
} else if ($_GET['name'] == "Geschichte") {
	$query5 = "SELECT * FROM quiz WHERE Thema_ID = '5'";
	$result = $db->query($query5);
} else if ($_GET['name'] == "Musik") {
	$query6 = "SELECT * FROM quiz WHERE Thema_ID = '6'";
	$result = $db->query($query6);
}

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
				<td class="rankingplayer"><?php echo $row['ID_Quiz'];?></td>
				<!-- Ausgabe des Namen -->
				<td class="rankingpoints"><a href="?site=questions&id=<?php  echo $row['ID_Quiz'];?>"><?php  echo $row['Name'];?></a></td>
				<!-- Ausgabe der Thema_ID -->
				<td class="rankingplayer"><?php echo $row['Thema_ID'];?></td>
			</tr>
		
<?php
}
?>
</table>