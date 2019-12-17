<?php
require_once("../ressources/database.php");
$antowrtzahl = 1;

	
	
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
					<td class="rankingpoints"><a><?php  echo $row['Name'];?></a></td>
					<!-- Ausgabe der Anzahl Punkte -->
			</tr>
	<?php
	}
	?>
</table>

	<form action="?site=erstellt" method="post">
		<input type="text" name="quizname" required="requiered" id="input_index" placeholder="Quizname" autocomplete="off"> 
		<input type="text" name="themaid" required="requiered" id="input_id" placeholder="Thema-ID" autocomplete="off"><br /> 
		<?php	
			for($frage=1; $frage<=10; $frage++) { ?>
				
				<div class="fragenblock">
					<div class="frage">
						<input type="text" required="required" name="frage<?php echo $frage?>" placeholder="Frage <?php echo $frage;?>">
					</div>
					<?php for ($antwort=1; $antwort<=4; $antwort++) { ?>
						<div class="antwort">
							<input type="radio" required="requiered" name="<?php echo $frage?>" value="antwort<?php echo $antowrtzahl?>" id="antwort<?php echo $antowrtzahl?>"> 
							<label for="antwort<?php echo $antowrtzahl?>">
								<span><span></span></span><input type="text" required="required" name="antwort<?php echo $antowrtzahl?>" placeholder="Antwort <?php echo $antwort;?>">
							</label>
						</div>
					<?php $antowrtzahl = $antowrtzahl + 1; }?>
					
				</div>
				
			<?php }?>
		<input type="submit" class="buttons" value="Erstellen">	
	</form> 

	
















