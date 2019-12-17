<?php $username = $_SESSION['username']; ?>
<form class="formular" action="site/pwactive.php" method="post">
	<table>
		<tr>
			<!-- Feld für PW - aenderbar -->
			<td>Username:</td>
			<td><input type="text" name="username" id="username" value="<?php echo $username ?>"
				autocomplete="off" maxlength="45" readonly="readonly" required></td>
		</tr>
		<tr>
			<!-- Feld für PW - aenderbar -->
			<td>Passwort: </td>
			<td><input type="password" name="pw" id="username" value=""
				autocomplete="off" maxlength="45" required></td>
		</tr>
		<tr>
			<!-- Feld für PW - aenderbar -->
			<td>Passwort best&auml;tigen: </td>
			<td><input type="password" name="pw2" id="username" value=""
				autocomplete="off" maxlength="45" required></td>
		</tr>
	</table>
	<input type="submit" id="button" value="Speichern">
<input type="button" id="button" value="Abbrechen"
	onclick="location='?site=profile'">
</form>
