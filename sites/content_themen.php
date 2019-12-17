<?php

/* --- GET informationen auslesen Start --- */
if (! empty ( $_GET ['seite'] )) {
	$seite = $_GET ["seite"];
} else if (! empty ( $_POST ['seite'] )) {
	$seite = $_POST ["seite"];
	var_dump ( $seite );
}

/* --- GET informationen auslesen End --- */

?>
<div class="grid">
	<?php
	/* --- Datenbank Start --- */
	
	include ("ressources/database.php");
	
	/* --- Datenbank End --- */
	
	$query2 = "SELECT Count(Thema_ID) FROM `quiz` WHERE Thema_ID = $seite"; // zaehlt wieviele Quiz es mit der ID gibt
	$resultat = $db->query ( $query2 );
	$anzahl = $resultat->fetch_array ();
	$anzahl2 = $anzahl ["Count(Thema_ID)"];
	
	/* --- Query Start --- */
	
	$query = "select id_quiz 
				from thema 
				join quiz on thema.ID_Thema=quiz.Thema_ID 
				where id_thema= $seite"; // Liesst alle Id der Quiz aus der DB
	
	$quiz = $db->query ( $query );
	$i = 0;
	while ( $row = $quiz->fetch_array () ) {
		$quiz2 [$i] = $row ["id_quiz"]; // Speicher alle ID in eine Liste
		$i ++;
	}
	
	$a = 0;
	while ( $a < $anzahl2 ) // Wiederholt die schleife fuer alle Quiz mit der ID
{
		?>
	
	<figure class="effect-honey">
	
	<?php
		
		$link = $quiz2 [$a];
		
		$pic1 = "select quiz.Name 
							from quiz 
							Join thema on thema.ID_thema = quiz.thema_ID 
							Where thema.ID_Thema = $seite AND ID_Quiz = $link"; //Liesst den Namen des Quiz aus der DB
		$rs = $db->query ( $pic1 );
		$row = $rs->fetch_array ();
		
		/* --- Query End --- */
		
		?>
		<img src="img/quiz/<?php echo $row ['Name'];?>.png" /> 
		<figcaption>
			<h2>
				<i>	
		<?php
		echo $row ['Name']; // Zeigt den Name des Quiz in Hover effect
		?>
				</i>
			</h2>
			<!-- Namen aus DB lesen -->
			<a
				href="?site=fragen&quiz=<?php echo $link ?>&bild=<?php echo $row ['Name'] ?>">View 
				more</a>

		</figcaption>
	</figure>
	
	<?php
		$a ++;
		$data2 ++;
	}
	?>
</div>

<p class="break"></p>
<div class="abstand"></div>