<?php
	/* --- Überprüft, ob der Benutzer angemeldet ist --- */
	if (! isset ( $_SESSION ['angemeldet'] ) || ! $_SESSION ['angemeldet']) {
		header ( "Location: mainlogin.php?site=content_log" ); // Wenn nicht, leitet weiter
		exit ();
	}
	?>