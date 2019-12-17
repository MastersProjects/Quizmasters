<?php

/* --- Datenbankverbindung Start und Variable definieren End --- */
include ("ressources/database.php");
$name = 0;

/* --- Datenbankverbindung End Variable definieren End--- */

/* --- GET URL Start --- */

if (! empty ( $_GET ['quiz'] )) {
	$quiz = $_GET ["quiz"];
} else if (! empty ( $_POST ['quiz'] )) {
	$quiz = $_POST ["quiz"];
} else {
	// Standardseite
	$quiz = 0;
}

$_SESSION['Quiz'] = $quiz;

/* --- GET URL End --- */

$abfrage = "SELECT Benutzer_ID, Quiz_ID, Datum from geloest";
$result3 = $db->query ( $abfrage );

while ( $zeile = $result3->fetch_array () ) {
	if (($zeile ['Benutzer_ID'] == $_SESSION ['username']) && ($zeile ['Quiz_ID'] == $quiz )) {
		$_SESSION ['Datum']= $zeile ['Datum']; ?>
<meta http-equiv="refresh" content="0, url=index.php?site=geloest"> <?php 	}
	else {
		continue;
	}
}


/* --- Query und ausf�hren Start --- */

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

/* --- Query und ausf�hren End --- */

?>
<form action="?site=auswertung&quiz=<?php echo $quiz ?>" method="post">
	<?php
	
while ( $row = $rs->fetch_array () ) {
		?><div class="frageblock">
		<div class="frage">
			<h3><?php echo $row['frage']; /* --- Frage --- */ ?></h3>
		</div>
		<?php
		
		/* --- Query und ausf�hren Start --- */
		
		/* --- ID_Antwort auslesen --- */
		$query4 = "select ID_Antwort
			from antwort
			where Frage_ID=$zahl order by Frage_ID asc limit 1";
		
		$a = $db->query ( $query4 );
		$b = $a->fetch_array ();
		$antwort = $b ["ID_Antwort"];
		
		/* --- Antwort auslesen --- */
		$query3 = "select antwort
					from antwort
					join frage on frage.ID_frage=antwort.frage_ID
					where FRAGE_ID= $zahl";
		
		$rs3 = $db->query ( $query3 );
		
		/* --- Query und ausf�hren End --- */
		
		/* --- Wiederholen solange es Werte hat Start --- */
		
		while ( $row3 = $rs3->fetch_array () ) {
			?>
				<div class="antwort">
			<input type="radio" required="required" name="<?php echo $name?>"
				value="<?php echo $antwort;?>" id="<?php echo $antwort;?>"> <label
				for="<?php echo $antwort;?>"><span><span></span></span><?php echo $row3['antwort']; /* --- Antworten --- */ ?></label>
		</div>
		
			<?php
			
$antwort = $antwort + 1;
		}
		/* --- Wiederholen solange es Werte hat Start --- */
		?>
		</div>
	<?php
		
$zahl = $zahl + 1;
		$name = $name + 1;
	}
	?>
			
		
	<input type="submit" class="button" value="Auswertung">

</form>