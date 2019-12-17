<?php
$username = $vorname = $nachname = $email = $passwort1 = $passwort2 = $kontinent = "";
$usernameErr = $vornameErr = $nachnameErr = $emailErr = $passwortErr = $kontinentErr = "";

$validation [0] = 0;
$validation [1] = 0;
$validation [2] = 0;
$validation [3] = 0;
$validation [4] = 0;
$validation [5] = 0;

if (isset ( $_POST ['submit'] )) {
	
	if ($_SERVER ["REQUEST_METHOD"] == "POST") {
		if (empty ( $_POST ["username"] )) {
			$usernameErr = "Username muss ausgefüllt sein ";
			$validation [0] = 0;
		} else {
			$username = test_input ( $_POST ["username"] );
			if (! preg_match ( "/^[a-zA-Z ]*$/", $username )) {
				$usernameErr = "Nur Buchstaben erlaubt";
				$validation [0] = 0;
			} else {
				$validation [0] = 1;
			}
		}
		if (empty ( $_POST ["vorname"] )) {
			$vornameErr = "Vorname muss ausgefüllt sein ";
			$validation [1] = 0;
		} else {
			$vorname = test_input ( $_POST ["vorname"] );
			if (! preg_match ( "/^[a-zA-Z]*$/", $vorname )) {
				$vornameErr = "Nur Buchstaben erlaubt";
				$validation [1] = 0;
			} else {
				$validation [1] = 1;
			}
		}
		
		if (empty ( $_POST ["nachname"] )) {
			$nachnameErr = "Vorname muss ausgefüllt sein ";
			$validation [2] = 0;
		} else {
			$nachname = test_input ( $_POST ["nachname"] );
			if (! preg_match ( "/^[a-zA-Z]*$/", $nachname )) {
				$nachnameErr = "Nur Buchstaben erlaubt";
				$validation [2] = 0;
			} else {
				$validation [2] = 1;
			}
		}
		
		if (empty ( $_POST ["email"] )) {
			$emailErr = "Email muss ausgefüllt sein ";
			$validation [3] = 0;
		} else {
			$email = test_input ( $_POST ["email"] );
			if (! filter_var ( $email, FILTER_VALIDATE_EMAIL )) {
				$emailErr = "Keine gültige Email eingegeben";
				$validation [3] = 0;
			} else {
				$validation [3] = 1;
			}
		}
		
		if (empty ( $_POST ["country"] )) {
			$kontinentErr = "Kontinent muss ausgefüllt sein";
			$validation [4] = 0;
		} else {
			$anzahl = test_input ( $_POST ["country"] );
			$validation [4] = 1;
		}
		
		if (empty ( $_POST ["pw"] )) {
			$passwortErr = "Passwort muss ausgefüllt sein ";
			$validation [5] = 0;
		} else {
			if ($_POST ["pw"] == $_POST ["pw2"]) {
				$validation [5] = 1;
			} else {
				$passwortErr = "Passwörter stimmen nicht überein";
				$validation [5] = 0;
			}
		}
	}
}
function test_input($data) {
	$data = trim ( $data );
	$data = stripslashes ( $data );
	$data = htmlspecialchars ( $data );
	return $data;
}
?>



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
		<form method="post">
			<input type="text" name="username" id="username"
				placeholder="Username" value="<?php echo $username?>" autocomplete="on" maxlength="25"><br />
				<span><?php echo $usernameErr?></span><br> <input type="text" name="vorname"
				id="vorname" placeholder="Vorname" value="<?php echo $vorname?>" autocomplete="on" maxlength="45"><br /> 
				<span><?php echo $vornameErr?><br></span> <input type="text" name="nachname"
				id="nachname" placeholder="Nachname" value="<?php echo $nachname?>" maxlength="45"
				autocomplete="on"><br /> 
				<span><?php echo $nachnameErr?></span><br> <input type="text" name="email"
				id="email" placeholder="E-mail" value="<?php echo $email?>" maxlength="254"><br />
			<span><?php echo $emailErr?></span> <br> <input type="password" name="pw"
				id="pass1" placeholder="Passwort" value="<?php echo $passwort1?>" autocomplete="off" maxlength="45"><br> 		
				<span><?php echo $passwortErr?><br> </span>
			<input type="password" maxlength="45" name="pw2" id="pass2"
				placeholder="Passwort wiederholen" value="<?php echo $passwort2?>" autocomplete="off"><br />
			<select id="country" name="country">
				<option value="">Bitte Kontinent w&auml;hlen</option>
				<option value="Afrika">Afrika</option>
				<option value="Asien">Asien</option>
				<option value="Europa">Europa</option>
				<option value="Nordamerika">Nordamerika</option>
				<option value="Suedamerika">S&uuml;damerika</option>
				<option value="Ozeanien">Ozeanien</option>
			</select> <br/>
			<span><?php echo $kontinentErr?></span><br> <input type="submit"
				name="submit" id="button" value="Registrieren" />
		</form>

	</div>

</div>
<p class="break"></p>


