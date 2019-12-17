<!DOCTYPE html>
<?php
$timestamp = date ( 'Y' );
?>
<html>
<head>
<meta charset="utf-8">
<title>Quizmasters | Error 500 - Internal Server Error</title>
<link rel="stylesheet" href="../styles/style.css" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Indie+Flower'
	rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">


</head>

<body>
<div id="navigation">
		<ul id="nav">
			<li><a href="index.php?site=home">Home</a></li>
			<li><a href="index.php?site=quiz&bild=quiz" id="quiz">Quiz</a>
				<ul>
					<li><a href="index.php?site=content_themen&seite=1&bild=sport">Sport</a></li>
					<li><a href="index.php?site=content_themen&seite=2&bild=tiere">Tiere</a></li>
					<li><a href="index.php?site=content_themen&seite=3&bild=games">Game</a></li>
					<li><a href="index.php?site=content_themen&seite=4&bild=geographie">Geographie</a></li>
					<li><a href="index.php?site=content_themen&seite=5&bild=geschichte">Geschichte</a></li>
					<li><a href="index.php?site=content_themen&seite=6&bild=musik">Musik</a></li>
				</ul></li>
			<li><a href="index.php?site=rangliste&bild=rang">Rangliste</a></li>
			<li><a href="index.php?site=profile">Mein Konto</a></li>
			<li><a href="index.php?action=logout">Abmelden</a></li>
		</ul>
	</div>
	<p class="break"></p>
	<div id="header">
		<img src="../img/banner/home.png" alt=bild />
	</div>

	<div id="content">
		<p class="titel">ERROR 500 Internal Server Error</p>
		<div class="left">
		<img src="../img/diverses/server.png" class="text" alt="bild" />
		</div>
		<div class="right">
		<h3 class="text">Keep calm and wait</h3>
		<h3 class="text" >Es liegt nicht an dir sondern an uns... <br/>
		Es tut uns Leid!</h3>
		<button onclick="goBack()">Zur&uuml;ck</button>
		</div>
		<p class="break"></p>
		<script>
				function goBack() {
    				window.history.back()
				}
			</script>
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

			<div id="quelle">

				<h2>Copyright</h2>


				<a>by Luca Marti, Phong Penglerd, Elia Perenzin</a><br> <a>&copy; </a><a>Quizmasters.ch</a>
				<a> <?php echo $timestamp?></a>

			</div>
		</div>

</body>
</html>


