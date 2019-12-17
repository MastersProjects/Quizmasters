<!DOCTYPE html>
<html>
<head>
<?php
require_once("ressources/header_seiten.php"); 
?> 
</head>
<body>
	<div id="content">
        	<div class="login_index">
        	<h1>Login Adminbereich</h1>
            <h2>Bitte logge dich ein:</h2>
			<form action="check.php" method="post">
				<input type="text" name="username" id="input_index"
					placeholder="Username" autocomplete="on"><br/> 
                    <input type="password"
					name="pw" id="input_index" placeholder="Passwort" autocomplete="off"> <br/>
                    <input
					type="submit" name="submit" id="submit_index" value="Anmelden"
					placeholder="Anmelden">
			</form>
		</div>
</body>
</html>
