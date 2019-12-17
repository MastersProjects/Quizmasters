<?php 	
	$pkt = ['Punkte'];
	mysql_connect("localhost", "root", "") or die (mysql_error ());
	mysql_select_db("quizmaster") or die(mysql_error());
	$query = "SELECT * FROM Thema";
	$rs = mysql_query($query);
?>
<?php while($row = mysql_fetch_array($rs)) {?>
	<a><?php echo $row['Name'];?></a>
<?php } mysql_close();?>