
<!DOCTYPE html>
<?php
$timestamp = date ( 'Y' );
?>
<html>
<head>
<meta charset="utf-8">
<title>Quizmasters</title>
<link rel="stylesheet" href="styles/style.css" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Indie+Flower'
	rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">


</head>

<body>
	<p class="break"></p>
	<div id="header">
		<img src="img/banner/home.png" alt=bild />
	</div>

	<div id="content">
		<p class="titel">Comming Soon</p>
		<p>Wir arbeiten f&uuml;r Dich an der Webseite. <br />
		Im Moment ist die Webseite nicht Verf&uuml;gbar. <br/>
		Wir bitten um Verst&auml;ndniss. </p>

	</div>

	<div id="footer">
		<div id="footer_center">
			<div id="about">
				<h2>About</h2>
				<a class="link" href="index.php?site=ueber">&Uuml;ber uns</a><br />
				<a class="link" href="index.php?site=kontakt">Kontakt</a><br /> <a
					class="link" href="index.php?site=impressum">Impressum</a><br /> <a
					class="link" href="index.php??site=bilderquellen">Bilder Quellen</a>
			</div>

			<div id="news">
				<h2>News</h2>
				<a class="no_underline">Die Webseite ist in der Beta-Phase und wird
					&uuml;berarbeitet.</a>
			</div>

			<div id="quality">
				<h2>Qualit&auml;t</h2>
				<a class="no_underline">100% Richtige Antworten</a>
			</div>
			<div id="quelle">

				<h2>Copyright</h2>


				<a>by Luca Marti, Phong Penglerd, Elia Perenzin</a><br> <a>&copy; </a><a>Quizmasters.ch</a>
				<a> <?php echo $timestamp?></a>

			</div>
		</div>

</body>
</html>


