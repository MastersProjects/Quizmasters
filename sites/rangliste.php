<?php

/* --- Variablen werden initialisiert Start --- */
$a = 1;
$pkt = [ 'Punkte' ];

/* --- Variablen werden initialisiert Start --- */

/* ---- DB Verbindung wird hergestellt Start ---- */

require_once ("ressources/database.php");

/* ---- DB Verbindung wird hergestellt Start ---- */

/* --- SQL Querys und Ausfuehrung auf der DB Start --- */

$query = "SELECT * FROM user WHERE Cheat = 'Nein' ORDER BY Punkte DESC LIMIT 0,10;";// Die Ersten 10 von der Tabelle user
$rs = $db->query ( $query ); // auswaehlen und anzeigen

/* --- SQL Querys und Ausfuehrung auf der DB End --- */

?>
<!-- Searchfunktion Start -->
<div class="suche">
	<h3>Du suchst einen Spieler?</h3>
	<form class="formular" action="index.php?site=search&bild=rang"
		method="post">
		<input type="search" name="searchfield" id="username"
			placeholder="Username eingeben" required> <input type="submit"
			value="Suchen">
	</form>
</div>
<!-- Searchfunktion End -->

<!-- Top 10 -->

<div id="center">
	<h1>World Top 10</h1>
	<table>
		<tr>
			<th class="ranking">Pos.</th>
			<th class="rankingplayer">Spieler</th>
			<th class="rankingpoints">Punkte</th>
			<th class="rankingpoints">Rang</th>
			<th class="rankingnation">Kontinent</th>
		</tr>
<?php
$a = 1; // Counter auf 0 setzen
while ( $row = $rs->fetch_array () ) { // Anzahl Reihen ausgeben
	if ($row['Cheat'] == "Nein"){
	?>
		<tr>
			<!-- Lies die Infos aus der DB -->
			<td class="ranking"><?php echo $a;?></td>
			
			<!-- Ausgabe des Counters -->
			<td class="rankingplayer"><a
				href="index.php?site=friend&user=<?php echo $row['ID_Benutzername'];?>"><?php echo $row['ID_Benutzername'];?></a></td>
				
			<!-- Ausgabe des Usernamen -->
			<td class="rankingpoints"><?php  echo $row['Punkte'];?></td>
			
			<!-- Ausgabe der Anzahl Punkte -->
			<td class="rankingpoints"><?php  echo $row['Rang']; ?></td>
			
			<!-- Ausgabe des Kontinenten -->
			<td class="rankingnation"><?php  echo $row['Kontinent']; ?></td>
			
			<!-- Ausgabe des Kontinenten -->
		<?php $a++?> <!-- Counter +1 -->
		</tr>
<?php
	}
	else{
		continue;
	}
}
?></table>
	<h1>Kontinentale Ansicht</h1>
	<!-- Weltkarte Start -->
	<div class=welkarte>
		<img src="img/weltkarte.png" alt="Karte" usemap="#worldmap">
		<map name="worldmap">

			<!-- Erster Wert x-Achse, Zweiter Wert y-Achse, ... -->
			<area href="?site=world&kontinent=Nordamerika" shape="poly"
				coords="201,114,204,111,240,95,274,76,297,54,317,43,333,47,343,41,346,27,353,16,353,5,297,4,245,4,213,11,170,18,145,29,126,29,99,27,79,30,60,40,51,46,43,57,30,63,28,73,60,65,81,59,93,56,99,66,99,77,94,89,90,100,89,109,91,126,98,141,110,157,124,165,139,171,153,178,164,188,175,190,180,177,185,175,168,168,180,161,200,163,212,165,212,175,217,183,225,180,226,165,209,146,192,138,184,127"
				alt="Nordamerika" title="Nordamerika">
			<area href="?site=world&kontinent=Suedamerika" shape="poly"
				coords="188,172,206,175,214,178,223,184,236,189,242,197,251,206,262,210,275,215,280,224,276,234,272,245,271,259,264,266,253,269,249,281,246,290,239,296,238,306,229,308,227,320,227,333,234,339,241,330,244,338,235,346,218,346,204,336,194,275,192,252,182,245,170,233,165,218,167,202,173,189,179,180"
				alt="S�damerika" title="S&uuml;damerika">
			<area href="?site=world&kontinent=Europa" shape="poly"
				coords="339,107,346,113,355,113,362,107,369,107,382,107,389,112,399,109,404,111,410,117,422,119,420,110,416,103,421,100,422,96,424,91,431,92,441,94,452,94,463,98,467,94,467,87,462,85,458,80,461,77,468,77,474,79,481,79,485,77,487,71,487,64,484,62,482,58,482,55,482,50,479,46,479,44,481,39,480,37,478,33,474,29,478,24,482,16,480,11,436,7,419,10,396,12,379,12,383,21,390,25,390,32,383,38,376,46,372,48,364,43,362,37,356,31,351,30,348,36,347,43,349,51,350,58,347,64,342,64,339,72,338,78,342,78,347,78,349,81,351,85,355,88,352,92,347,92,342,93,339,94,337,100"
				alt="Europa" title="Europa">
			<area href="?site=world&kontinent=Afrika" shape="poly"
				coords="367,109,379,108,387,110,391,117,398,122,403,120,413,120,428,123,436,125,439,131,439,140,444,147,449,158,455,167,462,175,471,174,480,170,485,172,479,183,470,202,460,210,458,224,463,233,465,235,473,234,479,239,487,247,496,257,487,264,475,255,471,265,465,272,458,269,453,261,446,251,444,258,443,268,439,273,435,278,428,285,419,294,406,295,398,291,392,280,385,261,383,240,387,233,384,220,378,213,377,202,377,196,372,194,366,192,355,193,347,194,336,194,326,189,320,177,318,170,306,169,298,161,310,160,318,161,320,154,319,148,323,138,310,137,307,130,313,121,321,126,330,128,335,123,343,115"
				alt="Afrika" title="Afrika">
			<area href="?site=world&kontinent=Asien" shape="poly"
				coords="475,25,477,34,478,39,476,45,479,53,479,61,483,65,483,70,478,76,472,72,462,73,456,79,458,87,460,94,453,95,446,91,444,98,441,99,432,96,424,100,418,106,420,113,430,114,436,114,435,121,436,129,440,137,446,148,450,156,455,166,461,175,477,172,491,163,498,150,500,143,507,143,515,147,521,154,528,163,527,172,522,182,521,198,523,207,529,206,531,194,532,184,537,185,547,191,550,188,553,180,549,168,554,161,560,154,567,154,572,161,572,172,576,188,585,206,597,219,610,227,633,233,651,235,671,229,665,216,654,214,656,210,664,207,667,203,672,191,678,182,694,173,700,165,698,158,681,133,677,121,673,109,670,101,676,94,680,84,681,74,682,70,693,74,711,75,725,75,734,69,725,65,707,68,692,65,685,60,683,55,690,50,695,47,698,42,691,37,672,30,661,27,643,28,625,25,612,25,605,19,579,18,585,24,573,24,562,22,545,22,544,18,532,16,519,13,507,10,495,10,501,15,489,17,486,21"
				alt="Asien" title="Asien">
			<area href="?site=world&kontinent=Ozenanien" shape="poly"
				coords="613,293,614,284,615,274,616,266,619,260,627,256,636,251,643,243,654,236,665,231,675,224,671,221,662,219,656,216,660,211,670,206,680,206,691,209,708,210,727,209,748,204,766,199,774,204,782,216,790,227,796,239,795,246,789,258,779,271,746,262,736,264,736,274,740,280,745,297,751,317,747,321,738,328,725,329,709,329,700,321,699,310,692,300,683,313,679,320,669,319,662,308,663,304,655,297,652,292,642,291,629,296,620,298,614,295"
				alt="Australien" title="Australien">
		</map>
	</div>
	<!-- Weltkarte Ende -->
</div>


<p class="break"></p>
<div class="abstand"></div>