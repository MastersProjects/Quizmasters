<?php $username = $_SESSION['username']; ?>
<form class="formular" action="sites/pwactive.php" method="post">
	<table>
		<tr>
			<!-- Feld für PW - aenderbar -->
			<td><input type="hidden" name="username" id="username" value="<?php echo $username ?>"
				autocomplete="off" maxlength="45" required></td>
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
	<input type="submit" value="Speichern">
<input type="button" value="Abbrechen"
	onclick="location='?site=profile'">
</form>
