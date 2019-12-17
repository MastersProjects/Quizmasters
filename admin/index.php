<?php
require_once ("check.php");
include("site/quizauth.php");
?>
<!DOCTYPE html>
<html>
<head> 
		<?php require_once("ressources/header_seiten.php"); ?>
	</head>

<body>
	<p class="break"></p>
	<div id="navigation">
			<?php require_once("ressources/navigation.php"); ?>
		</div>
	<div id="header">
		<?php
		
		// Wo sind die Bilder?
		$bilderordner = 'img/banner/';
		$defaultimg = 'home';
		
		
		// Wurde eine Bild �bergeben 1.) GET 2.) POST?
		if (! empty ( $_GET ['bild'] )) {
			$bilder = $_GET ["bild"];
		} else if (! empty ( $_POST ['bild'] )) {
			$bilder = $_POST ["bild"];
		} else {
			// Standardbild
			$bilder = $defaultimg;
		}
		
		// Gibt es das Bild wirklich?
		if (! file_exists ( $bilderordner . $bilder . ".png" )) {
			$bilder = $defaultimg;
		}
		
		// Bild laden
		echo "<img src=\"$bilderordner$bilder.png\" alt=bild />";
		
		?>
	</div>

	<div id="content">
			
			<?php
			
			// Wo sind die Seiten?
			$seitenordner = 'site/';
			$defaultseite = 'home';
			
			// Wurde eine Seite �bergeben 1.) GET 2.) POST?
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
	
	<div id="footer">
			<?php require_once("ressources/footer_log.php"); ?>
	</div>

</body>
</html>