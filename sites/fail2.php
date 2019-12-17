<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-13">
<link rel="stylesheet" href="../styles/index.css" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Indie+Flower'
	rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<title>Quizmasters</title>


</head>
<body>
	<div id="header">
		<div id="header_left">
			<a href="../mainlogin.php"><img src="../img/logo.png" class="logo"
				alt="Logo"></a>
		</div>

		<div class="login">
			<form action="../check.php" method="post">
				<input type="text" name="username" id="username"
					placeholder="Username" autocomplete="on"> <input type="password"
					name="pw" id="pw" placeholder="Passwort" autocomplete="off"> <input
					type="submit" name="submit" id="submit" value="Anmelden">
			</form>

		</div>
	</div>
	<div id="content">

		<div id="left">
		<h1>Herzlich willkommen auf Quizmasters.ch</h1>
	<p>Quizmasters ist eine Seite auf der du dein Wissen testen kannst, wir
		bieten verschiedene Quiz zu verschiedenen Themen, wie Fussball, Games
		oder Tiere an. Zeige dein K&ouml;nnen und steige in der Rangliste bis
		ganz nach oben.
	
	
	<p class="fett">
		Viel Spass! <br> dein Quizmasters Team</span>
	</p>

		</div>
		<div id="right">
			<div class="regi">
				<p>
					<span>Dieser Username existiert bereits!</span>
				</p>
				<form class="formular" action="../ressources/registration.php"
					method="post">

					<input type="text" name="username" id="fail_user"
						placeholder="Username" autocomplete="on" maxlength="25" required><br />

					<input type="text" name="vorname" id="vorname"
						placeholder="Vorname" autocomplete="on" maxlength="45" required><br />

					<input type="text" name="nachname" id="nachname"
						placeholder="Nachname" maxlength="45" autocomplete="on" required><br />

					<input type="email" name="email" id="email" placeholder="E-mail"
						maxlength="254" required><br /> <input type="password" name="pw"
						id="pass1" placeholder="Passwort" autocomplete="off"
						maxlength="45" required><br /> <input type="password"
						maxlength="45" name="pw2" id="pass2"
						onkeyup="checkPass(); return false;"
						placeholder="Passwort wiederholen" autocomplete="off" required><br />

					<select id="country" name="country" required="required">
						<option value="">Bitte Kontinent w&auml;hlen</option>
						<option value="Afrika">Afrika</option>
						<option value="Asien">Asien</option>
						<option value="Europa">Europa</option>
						<option value="Nordamerika">Nordamerika</option>
						<option value="Suedamerika">S&uuml;damerika</option>
						<option value="Ozeanien">Ozeanien</option>
					</select> <input type="submit" name="Submit" id="submittwo"
						value="Registrieren"> <br /> <span id="confirmMessage"></span>



				</form>
			</div>

		</div>
<div class="break"></div>
	</div>
	<div id="footer">
		<div id="footer_center"><?php require_once("../ressources/footer_error.php"); ?></div>
	</div>

</body>
</html>
