<div id="left">
	<div id="delete">
		<h3>
			<object data="img/diverses/i.svg" type="image/svg+xml"> </object>
			Dein Profil wurde erfolgreicht gel&ouml;scht. Tsch&uuml;ss!

		</h3>


	</div>
</div>
<div id="right">
	<div class="regi">
		<form class="formular" action="ressources/registration.php"
			method="post">
			<input type="text" name="username" id="username"
				placeholder="Username" autocomplete="on" maxlength="25" required><br />
			<input type="text" name="vorname" id="vorname" placeholder="Vorname"
				autocomplete="on" maxlength="45" required><br /> <input type="text"
				name="nachname" id="nachname" placeholder="Nachname" maxlength="45"
				autocomplete="on" required><br /> <input type="email" name="email"
				id="email" placeholder="E-mail" maxlength="254" required><br /> <input
				type="password" name="pw" id="pass1" placeholder="Passwort"
				autocomplete="off" maxlength="45" required><br /> <input
				type="password" maxlength="45" name="pw2" id="pass2"
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
			</select> 
			<br />
			<br />
			<input type="submit" name="Submit" id="submit"
				value="Registrieren" placeholder="Anmelden"><br /> <br /> <span
				id="confirmMessage" class="confirmMessage"></span>



		</form>

	</div>

</div>
<p class="break"></p>


