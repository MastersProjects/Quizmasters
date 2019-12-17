<?php
/* --- Variable initialisierung Start --- */
$username = $_SESSION ['username'];
$punkte = 0;
$name = 0;
$get = 0;

/* --- Variable initialisierung Start --- */

/* --- Authentifizierung und Database Start--- */

include ('quizauth.php');
require_once ("ressources/database.php");

/* --- Authentifizierung und Database End --- */

/* --- GET Information Start --- */

if (! empty ( $_GET ['quiz'] )) {
	$quiz = $_GET ["quiz"];
} else if (! empty ( $_POST ['quiz'] )) {
	$quiz = $_POST ["quiz"];
} else {
	// Standardseite
	$quiz = 0;
}

$abfrage = "SELECT Benutzer_ID, Quiz_ID, Datum from geloest";
$result3 = $db->query ( $abfrage );

while ( $zeile = $result3->fetch_array () ) {
	if (($zeile ['Benutzer_ID'] == $_SESSION ['username']) && ($zeile ['Quiz_ID'] == $quiz)) {
		$_SESSION ['Datum'] = $zeile ['Datum'];
		?>
<meta http-equiv="refresh" content="0, url=index.php?site=geloest">
<?php
	
} else {
		continue;
	}
}
/* --- GET Information End --- */

/* --- Auswertungs Code --- */

/*
 * $get = 0;
 * for ($i=0; $i<=10; $i++){
 * $a = $_POST[$get]; //ID_Antwort
 *
 * $query = "Select Richtig
 * from antwort
 * where ID_Antwort=$a";
 *
 * $rs = $db->query ( $query );
 * $antwort = $rs->fetch_array (); //Richtig Zahl (0 oder 1)
 *
 *
 *
 * if ($antwort2["Richtig"] == 1) { ?>
 * <p><?php echo "Richtig!"?></p>
 * <?php }else{?>
 * <p><?php echo "Flasch!"?></p>
 * <?php } $get = $get+1;}
 *
 */

/* --- Anzeige -------------------------------------------------------- */

/* --- Query DB Start --- */

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

/* --- Query DB End --- */
?>

<form action="?site=auswertung" method="post">
	<?php
	
	/* --- Antworten aus DB lesen Start --- */
	
	while ( $row = $rs->fetch_array () ) {
		
		$p = $_POST [$get]; // ID_Antwort
		
		$query6 = "Select Richtig
						from antwort
						where ID_Antwort=$p";
		
		$r = $db->query ( $query6 );
		$antwort2 = $r->fetch_array (); // Richtig Zahl (0 oder 1)
		
		/* --- Antworten aus DB lesen End --- */
		
		?>
	<div class="frageblock">
		<div class="frage">
			<h3><?php echo $row['frage']; /* --- Frage --- */ ?></h3>
		</div>
	<?php
		/* --- ID_Antwort auslesen --- */
		$query4 = "select ID_Antwort
					from antwort
					where Frage_ID=$zahl order by Frage_ID asc limit 1";
		
		/* --- Query auf DB ausf�hren Start --- */
		
		$a = $db->query ( $query4 );
		$b = $a->fetch_array ();
		$antwort = $b ["ID_Antwort"];
		
		/* --- Query auf DB ausf�hren End --- */
		
		/* --- Antwort auslesen --- */
		$query3 = "select antwort
					from antwort
					join frage on frage.ID_frage=antwort.frage_ID
					where FRAGE_ID= $zahl";
		
		/* --- Query auf DB ausf�hren Start --- */
		
		$rs3 = $db->query ( $query3 );
		
		/* --- Query auf DB ausf�hren End --- */
		
		/* --- Antworten pro Frage auslesen Start --- */
		
		while ( $row3 = $rs3->fetch_array () ) {
			?>
		<div class="antwort">
			<input type="radio"
				<?php
			
			if ($p == $antwort) {
				echo 'checked="checked"'; // Pr�ft ob Antwort gleich checked
			}
			?>
				name="<?php echo $name?>" value="<?php echo $antwort;?>"
				id="<?php echo $antwort;?>"> <label for="<?php echo $antwort;?>"
				<?php
			if ($p == $antwort) {
				if ($antwort2 ["Richtig"] == 0) {
					echo 'class="red"'; // Wenn Falsch, dann class red
				} else {
					echo 'class="green"'; // Wenn Richtig, dann class green
				}
			}
			;
			?>> <span><span></span></span><?php echo $row3['antwort']; /* --- Antworten --- */ ?> 
			</label>
		</div>
		<!-- Punkte Z�hler Start -->
		<?php $antwort = $antwort+1; }?> <!-- Variable neuer Wert zu weisen --> 
		<?php  if ($antwort2["Richtig"] == 1) { ?>
				<p><?php $punkte = $punkte+10;?></p>
		<!-- Wenn Richtig, dann +10 Punkte -->
			<?php
		} else {
			?>
				<p><?php $punkte = $punkte-5;?></p>
		<!-- Wenn Falsch, dann -5 Punkte -->
			<?php } ?>
		</div>
		<?php
		$get = $get + 1;
		$zahl = $zahl + 1;
		$name = $name + 1;
	}
	?>	<!-- Punkte Z�hler End -->
</form>
<?php
// Punkte auslesen
$query5 = "Select Punkte
			from user
			where user.ID_Benutzername = '$username'";

$x2 = $db->query ( $query5 );
$y2 = $x2->fetch_array ();
$PunkteJetzt = $y2 ["Punkte"];

// Punkte hinzuf�gen
$query7 = "UPDATE user
			SET Punkte = ($PunkteJetzt + $punkte) 
			Where ID_Benutzername = '$username'";

$x3 = $db->query ( $query7 );

$abfrage = "SELECT Benutzer_ID, Quiz_ID, Datum from geloest";
$result3 = $db->query ( $abfrage );

while ( $zeile = $result3->fetch_array () ) {
	if (($zeile ['Benutzer_ID'] == $_SESSION ['username']) && ($zeile ['Quiz_ID'] == $quiz)) {
		$_SESSION ['Datum'] = $zeile ['Datum'];
		?>
<meta http-equiv="refresh" content="0, url=index.php?site=geloest">
<?php
	
} else {
		continue;
	}
}

?>
<p class="auswertung"> Punkte: <?php echo $punkte;?></p>
<p class="auswertung">
<?php
$x2 = $db->query ( $query5 );
$y2 = $x2->fetch_array ();
$PunkteJetzt = $y2 ["Punkte"];
echo "Neuer Punktestand: " . $PunkteJetzt;


$timestamp = date ( 'd.m.Y' ); //Eintragen nach gel�stem quiz
$einfugen = "INSERT INTO geloest (ID_Geloest, Benutzer_ID, Quiz_ID, Datum, Punkte)
		    	VALUES ('" . '' . "', '" . $username . "', '" . $quiz . "', '" . $timestamp . "', '" . $punkte . "')";
$db->query ( $einfugen );


$anzahlquiz ="select count(ID_Quiz) from quiz";
	$resultat = $db->query ( $anzahlquiz );
	$anzahl = $resultat->fetch_array ();
	$anzahl2 = $anzahl ["count(ID_Quiz)"];
	$anzahl2 = $anzahl2 * 100;
	
if ($PunkteJetzt > $anzahl2) {  
	$cheat = "UPDATE user SET Cheat='Ja' WHERE ID_Benutzername='$username';";
	$cheat_result = $db->query ( $cheat );
} else {
	//ohne geht es nicht
}


if ($PunkteJetzt < 150) { //Kategorie bestimmen neue Puktzahl
	?><br />
	<button onclick="location='?site=quiz&bild=quiz'">Zur&uuml;ck zum Quiz</button><?php
} else if (($PunkteJetzt <= 450) && ($PunkteJetzt > 151)) {
	$query = "UPDATE user SET Rang='Fortgeschrittener' WHERE ID_Benutzername='$username';";
	$rs = $db->query ( $query );
	?><br />
	<button onclick="location='?site=quiz&bild=quiz'">Zur&uuml;ck zum Quiz</button><?php
} else if (($PunkteJetzt <= 650) && ($PunkteJetzt > 451)) {
	$query1 = "UPDATE user SET Rang='Quizprofi' WHERE ID_Benutzername='$username';";
	$rs1 = $db->query ( $query1 );
	?><br />
	<button onclick="location='?site=quiz&bild=quiz'">Zur&uuml;ck zum Quiz</button><?php
} else if (($PunkteJetzt <= 800) && ($PunkteJetzt > 651)) {
	$query2 = "UPDATE user SET Rang='Quizmaster' WHERE ID_Benutzername='$username';";
	$rs2 = $db->query ( $query2 );
	?><br />
	<button onclick="location='?site=quiz&bild=quiz'">Zur&uuml;ck zum Quiz</button><?php
} else {
	?><br />
	<button onclick="location='?site=quiz&bild=quiz'">Zur&uuml;ck zum Quiz</button><?php
}
?>
</p>




