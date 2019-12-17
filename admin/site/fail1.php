<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Quizmasters</title>
<link rel="stylesheet" href="../styles/style.css" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<meta name="description" content="Auf Quizmasters kannst du jedes Quiz kostenlos spielen, für jede
	richtige Antwort in einem Quiz gibt es 10 Punkte. Wenn die Frage
	jedoch falsch beantwortet wird, werden dir 5 Punkte abgezogen. Wir wünschen dir viel Spass beim Lösen unserer Quizfragen.">
</head>
<body>
	<div id="content">
        	<div class="login_index">
        	<h1>Login Adminbereich</h1>
            <h2>Benutzername oder Passwort nicht korrekt:</h2>
			<form action="../check.php" method="post">
				<input type="text" name="username" class="input_index_fail"
					placeholder="Username" autocomplete="on"><br/> 
                    <input type="password"
					name="pw" class="input_index_fail" placeholder="Passwort" autocomplete="off"> <br/>
                    <input
					type="submit" name="submit" id="submit_index" value="Anmelden"
					placeholder="Anmelden">
			</form>
		</div>
</body>
</html>
