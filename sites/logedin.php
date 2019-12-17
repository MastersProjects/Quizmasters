<?php

/* --- Ausgelogt --- */
if (isset ( $_GET ['action'] ) && $_GET ['action'] == "logout") {
	session_destroy ();
}
?>
