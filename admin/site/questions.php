<?php
require_once ("ressources/database.php");
$name = 0;
$antowrtzahl = 1;

if (! empty ( $_GET ['id'] )) {
	$quiz = $_GET ["id"];
} else if (! empty ( $_POST ['id'] )) {
	$quiz = $_POST ["id"];
} else {
	// Standardseite
	$id = 0;
}

$query3 ="SELECT *
			from quiz
			where ID_Quiz=$quiz";
$x2 = $db->query ( $query3 );
$y2 = $x2->fetch_array ();	
$quizname = $y2 ["Name"];
$themaid = $y2 ["Thema_ID"];				
			

$query2 = "select ID_Frage
			from frage
			where Quiz_id=$quiz order by quiz_id asc limit 1";

$x = $db->query ( $query2 );
$y = $x->fetch_array ();
$zahl = $y ["ID_Frage"];

/* --- Fragen auslesen --- */

$query = "select frage
			from frage
			where quiz_id= $quiz";

$rs = $db->query ( $query );

?>
<form action="?site=bearbeitet&id=<?php echo $quiz;?>" method="post">
	<input type="text" name="quizname" required="requiered" value="<?php echo $quizname;?>" id="input_index" > 
	<input type="text" name="themaid" required="requiered" value="<?php echo $themaid;?>" id="input_id" ><br /> 
	<?php 
	for($frage=1; $frage<=10; $frage++) { 
		$row = $rs->fetch_array ();
		?>
		<div class="fragenblock">	
			<div class="frage">
				<input type="text" name="frage<?php echo $frage?>" id="input_fragen" value="<?php echo htmlentities($row['frage'])?>" required> <!-- Frage  -->
			</div>
			<?php
			
			/* --- Query und ausf�hren Start --- */
			
			/* --- ID_Antwort auslesen --- */
		
			
			/* --- Antwort auslesen --- */
			$query3 = "select antwort
						from antwort
						join frage on frage.ID_frage=antwort.frage_ID
						where FRAGE_ID= $zahl";
			
			$rs3 = $db->query ( $query3 );
			
			/* --- Query und ausf�hren End --- */
			
			/* --- Wiederholen solange es Werte hat Start --- */
			$query4 = "select ID_Antwort
			from antwort
			where FRAGE_ID=$zahl order by Frage_ID asc limit 1";
				
			$a = $db->query ( $query4 );
			$b = $a->fetch_array ();
			$antwortid = $b ["ID_Antwort"];
			
			for ($antwort=1; $antwort<=4; $antwort++) { 
				$row3 = $rs3->fetch_array ();
				$antworttext = $row3['antwort'];
				
				
				
				$query5 = "SELECT Richtig
							FROM antwort
							WHERE ID_Antwort='$antwortid'";
				
				$a2 = $db->query ( $query5 );
				$b2 = $a2->fetch_array ();
				$richtig = $b2["Richtig"];
				
				
				?>			
				<div class="antwort">
					<input 	type="radio" 
							required="requiered" 
							name="<?php echo $frage?>" 
							value="antwort<?php echo $antowrtzahl?>" 
							id="antwort<?php echo $antowrtzahl?>"
							<?php if ($richtig == 1) {
										echo 'checked="checked"';
							}?>
					>
					<label for="antwort<?php echo $antowrtzahl?>">
						<span><span></span></span><input type="text" name="antwort<?php echo $antowrtzahl?>" id="input_antworten" value="<?php echo htmlentities($antworttext)?>" required> <!-- Antwort  -->
					</label>
				</div>
			<?php $antowrtzahl = $antowrtzahl+ 1; $antwortid = $antwortid + 1;
			}?>
		</div>
	<?php $zahl = $zahl + 1;  
	}
				
	
			
			/* --- Wiederholen solange es Werte hat Start --- */
			
	 
	 $name = $name + 1; 	
	?>
	<input type="submit" id="button" value="Speichern">
</form>
