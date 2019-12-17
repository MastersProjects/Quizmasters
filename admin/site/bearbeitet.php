<?php
require_once("../ressources/database.php");

if (! empty ( $_GET ['id'] )) {
	$quiz = $_GET ["id"];
} else if (! empty ( $_POST ['id'] )) {
	$quiz = $_POST ["id"];
} else {
	// Standardseite
	$id = 0;
}

$azahl = 1;

$name = $db->escape_string ( $_POST ['quizname'] );
$themaid = $db->escape_string ( $_POST ['themaid'] );


$nameneu = "UPDATE quiz
			SET Name = '$name'
			WHERE ID_Quiz = $quiz";

$themaidneu = "UPDATE quiz
				SET Thema_ID = $themaid
				WHERE ID_Quiz = $quiz";

$db->query ( $nameneu );
$db->query ( $themaidneu );

$query2 = "SELECT ID_Frage
			FROM frage
			Where Quiz_ID= '$quiz'";

$row2 = $db->query ( $query2 );
$x2 = $row2->fetch_array ();
$frageid = $x2['ID_Frage'];

$query3 = "SELECT ID_Antwort
			FROM antwort
			Where ID_Antwort = $frageid";

$row3 = $db->query ( $query3 );
$x3 = $row3->fetch_array ();
$antwortid = $x3['ID_Antwort'];

?>





<?php 
for($fzahl=1; $fzahl<=10; $fzahl++) { 
	$frage = $db->escape_string ( $_POST ["frage$fzahl"] );
	
	//Frage bearbeiten
	$frageneu = "UPDATE frage 
				SET Frage = '$frage'
				WHERE ID_Frage = $frageid";
	$db->query ( $frageneu );
	
	?>
	
	
	
	
	<?php for($i=1; $i<=4; $i++) {
				$antwort = $db->escape_string ( $_POST ["antwort$azahl"] ); 
				$y = $db->escape_string ( $_POST ["$fzahl"] ); // = "antwort$azahl"
				
				if ($y == "antwort$azahl") {
					$richtig = 1;
				}
				else if ($y != "antwort$azahl")  {
					$richtig = 0;
				}
				
				
				
				$antwortneu = "UPDATE antwort
								SET Antwort = '$antwort'
								WHERE ID_Antwort = $antwortid";
				
				$richtigneu = "UPDATE antwort
								SET Richtig = $richtig
								WHERE ID_Antwort = $antwortid";
				
				$antwortid = $antwortid + 1;
							
				$db->query ( $antwortneu );
				$db->query ( $richtigneu );
				
				?>
				
<?php $azahl = $azahl + 1; }
$frageid = $frageid + 1;
}
?>

<h1>Quiz wurde bearbeitet</h1>
<button onclick="location='index.php'">Zur&uuml;ck</button>








































