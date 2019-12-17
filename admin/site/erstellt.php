<?php
require_once("../ressources/database.php");
$azahl = 1;

/* Quiz einf�gen */
$name = $db->escape_string ( $_POST ['quizname'] );
$themaid = $db->escape_string ( $_POST ['themaid'] );

$abfrage = "INSERT INTO quiz (ID_Quiz, Name, Thema_ID)
		    	VALUES ('" .''. "', '" . $name . "', '" . $themaid . "')";
$db->query ( $abfrage );


$quizquery = "Select ID_Quiz
			from quiz
			where Name='$name'";

$row = $db->query ( $quizquery );
$x = $row->fetch_array ();
$quizid = $x['ID_Quiz'];


?>



<?php 
for($fzahl=1; $fzahl<=10; $fzahl++) { 
	$frage = $db->escape_string ( $_POST ["frage$fzahl"] );
	
	$query = "INSERT INTO frage (ID_Frage, Frage, Quiz_ID)
				VALUES ('','$frage' ,'$quizid')";
	$db->query ( $query );
	
	$query2 = "SELECT ID_Frage
				FROM frage
				Where Frage= '$frage'";
	
	$row2 = $db->query ( $query2 );
	$x2 = $row2->fetch_array ();
	$frageid = $x2['ID_Frage'];
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
		
		
		
		$query3 = "INSERT INTO antwort (ID_Antwort, Antwort, Richtig, FRAGE_ID)
					VALUES ('','$antwort' ,'$richtig' , '$frageid')";
		$db->query ( $query3 );
		
		?>
		
<?php $azahl = $azahl + 1; }

}

?>

<h1>Quiz wurde erstellt</h1>
<button onclick="location='index.php'">Zur&uuml;ck</button>