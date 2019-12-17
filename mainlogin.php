<!DOCTYPE html>
<html>
<head>
<?php
require_once("ressources/header_index.php"); ?> 
</head>
<body>
	<div id="header">
		<div id="header_left">
			<a href="mainlogin.php" title="mainlogin" ><img src="img/logo.png" title="logo" class="logo"
				alt="Logo"></a>
		</div>

		<div class="login">
			<form action="check.php" method="post">
				<input type="text" name="username" id="username"
					placeholder="Username" autocomplete="on"> <input type="password"
					name="pw" id="pw" placeholder="Passwort" autocomplete="off"> <input
					type="submit" name="submit" id="submit" value="Anmelden"
					placeholder="Anmelden">
			</form>

		</div>
	</div>

	<div id="content">
       
       <?php 
//Wird gebraucht, dass footer seiten auch auf mainlog angezeigt werden
// Wo sind die Seiten?
							$seitenordner = 'sites/';
							$defaultseite = 'content_log';
							
							// Wurde eine Seite Übergeben 1.) GET 2.) POST?
							if (! empty ( $_GET ['site'] )) {
								$seite = $_GET ["site"];
							} else if (! empty ( $_POST ['site'] )) {
								$seite = $_POST ["site"];
							} else {
								// Standardseite
								$seite = $defaultseite;
							}
							
							// Gibt es die Datei wirklich?
							if (! file_exists ( $seitenordner . $seite . ".php" )) {
								$seite = $defaultseite . ".php";
							}
							
							// Inhalt einlesen
							include $seitenordner . basename ( $seite . ".php" );
							?>

                    
       </div>
	<p class="break"></p>
	<div id="footer">
		<div id="footer_center">
             <?php require_once("ressources/footer_log.php"); ?>
             </div>
	</div>

</body>
</html>
