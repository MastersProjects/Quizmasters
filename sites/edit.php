<?php
/* --- DB Verbindung und Auth Start --- */
include ("quizauth.php");
require_once ("ressources/database.php");

/* --- DB Verbindung und Auth End --- */

/* --- SQL Query Start --- */
$username = $_SESSION ['username'];
$qy_user = "SELECT * FROM user WHERE ID_Benutzername =  '$username'";

/* --- SQL Query End --- */

/* --- Variabeln definieren Start --- */

$rs = $db->query ( $qy_user );
$row = $rs->fetch_array ();
$avatar = $row ['Avatar'];
$rang = $row ['Rang'];
$kontinent = $row ['Kontinent'];
$vorname = $row ['Vorname'];
$nachname = $row ['Name'];
$email = $row ['Email'];
$land = $row ['Land'];
$passwort = $row ['Passwort'];

/* --- Variabeln definieren End --- */

?>

<!-- HTML START -->

<p class="titel">Dein Profil:</p>
<div id="mid">

	<form class="formular" action="sites/active.php" method="post">

		<input type="hidden" name="origname" value="<?php echo $username?>"> <input
			type="hidden" name="origname" value="<?php echo $rang?>">
		<table>
			<tr>
				<!-- Verborgenes Feld für den Username - Liest den Username aus dem Formular aus -->
				<td><input type="hidden" name="username" id="username"
					value="<?php echo $username?>" readonly="readonly"></td>
			</tr>
			<tr>
				<!-- Feld für Vornamen - aenderbar -->
				<td>Vorname:</td>
				<td><input type="text" name="vorname" id="username"
					value="<?php echo $vorname?>" autocomplete="on" maxlength="20"
					required></td>
			</tr>
			<tr>
				<!-- Feld für Nachname - aenderbar -->
				<td>Nachname:</td>
				<td><input type="text" name="nachname" id="username"
					value="<?php echo $nachname?>" autocomplete="on" maxlength="20"
					required></td>
			</tr>
			<tr>
				<!-- Feld für Email - aenderbar -->
				<td>E-mail:</td>
				<td><input type="email" name="email" id="username"
					value="<?php echo $email?>" autocomplete="on" maxlength="254"
					required></td>
			</tr>
			<tr>
				<!-- Feld für Kontinent - aenderbar -->
				<td>Kontinent:</td>
				<td><select id="country" name="kontinent" required="required">
						<option name="l" value="<?php echo $kontinent?>"><?php echo $kontinent?></option>
						<option name="l" value="Asien">Asien</option>
						<option name="l" value="Afrika">Afrika</option>
						<option name="l" value="Nordamerika">Nordamerika</option>
						<option name="l" value="Suedamerika">S&uuml;damerika</option>
						<option name="l" value="Europa">Europa</option>
						<option name="l" value="Ozeanien">Ozeanien</option>
				</select></td>
			</tr>

			<tr>
				<!-- Feld für Land - aenderbar -->
				<td>Land:</td>
				<td><select id="country" name="country" required="required">
						<option name="l" value="<?php echo $land?>"><?php echo $land?></option>
						<option name="l" value="Afganistan">Afghanistan</option>
						<option name="l" value="Albania">Albania</option>
						<option name="l" value="Algeria">Algeria</option>
						<option name="l" value="American Samoa">American Samoa</option>
						<option name="l" value="Andorra">Andorra</option>
						<option name="l" value="Angola">Angola</option>
						<option name="l" value="Anguilla">Anguilla</option>
						<option name="l" value="Antigua &amp; Barbuda">Antigua &amp;
							Barbuda</option>
						<option name="l" value="Argentina">Argentina</option>
						<option name="l" value="Armenia">Armenia</option>
						<option name="l" value="Aruba">Aruba</option>
						<option name="l" value="Australia">Australia</option>
						<option name="l" value="Austria">Austria</option>
						<option name="l" value="Azerbaijan">Azerbaijan</option>
						<option name="l" value="Bahamas">Bahamas</option>
						<option name="l" value="Bahrain">Bahrain</option>
						<option name="l" value="Bangladesh">Bangladesh</option>
						<option name="l" value="Barbados">Barbados</option>
						<option name="l" value="Belarus">Belarus</option>
						<option name="l" value="Belgium">Belgium</option>
						<option name="l" value="Belize">Belize</option>
						<option name="l" value="Benin">Benin</option>
						<option name="l" value="Bermuda">Bermuda</option>
						<option name="l" value="Bhutan">Bhutan</option>
						<option name="l" value="Bolivia">Bolivia</option>
						<option name="l" value="Bonaire">Bonaire</option>
						<option name="l" value="Bosnia &amp; Herzegovina">Bosnia &amp;
							Herzegovina</option>
						<option name="l" value="Botswana">Botswana</option>
						<option name="l" value="Brazil">Brazil</option>
						<option name="l" value="British Indian Ocean Ter">British Indian
							Ocean Ter</option>
						<option name="l" value="Brunei">Brunei</option>
						<option name="l" value="Bulgaria">Bulgaria</option>
						<option name="l" value="Burkina Faso">Burkina Faso</option>
						<option name="l" value="Burundi">Burundi</option>
						<option name="l" value="Cambodia">Cambodia</option>
						<option name="l" value="Cameroon">Cameroon</option>
						<option name="l" value="Canada">Canada</option>
						<option name="l" value="Canary Islands">Canary Islands</option>
						<option name="l" value="Cape Verde">Cape Verde</option>
						<option name="l" value="Cayman Islands">Cayman Islands</option>
						<option name="l" value="Central African Republic">Central African
							Republic</option>
						<option name="l" value="Chad">Chad</option>
						<option name="l" value="Channel Islands">Channel Islands</option>
						<option name="l" value="Chile">Chile</option>
						<option name="l" value="China">China</option>
						<option name="l" value="Christmas Island">Christmas Island</option>
						<option name="l" value="Cocos Island">Cocos Island</option>
						<option name="l" value="Colombia">Colombia</option>
						<option name="l" value="Comoros">Comoros</option>
						<option name="l" value="Congo">Congo</option>
						<option name="l" value="Cook Islands">Cook Islands</option>
						<option name="l" value="Costa Rica">Costa Rica</option>
						<option name="l" value="Cote DIvoire">Cote D'Ivoire</option>
						<option name="l" value="Croatia">Croatia</option>
						<option name="l" value="Cuba">Cuba</option>
						<option name="l" value="Curaco">Curacao</option>
						<option name="l" value="Cyprus">Cyprus</option>
						<option name="l" value="Czech Republic">Czech Republic</option>
						<option name="l" value="Denmark">Denmark</option>
						<option name="l" value="Djibouti">Djibouti</option>
						<option name="l" value="Dominica">Dominica</option>
						<option name="l" value="Dominican Republic">Dominican Republic</option>
						<option name="l" value="East Timor">East Timor</option>
						<option name="l" value="Ecuador">Ecuador</option>
						<option name="l" value="Egypt">Egypt</option>
						<option name="l" value="El Salvador">El Salvador</option>
						<option name="l" value="Equatorial Guinea">Equatorial Guinea</option>
						<option name="l" value="Eritrea">Eritrea</option>
						<option name="l" value="Estonia">Estonia</option>
						<option name="l" value="Ethiopia">Ethiopia</option>
						<option name="l" value="Falkland Islands">Falkland Islands</option>
						<option name="l" value="Faroe Islands">Faroe Islands</option>
						<option name="l" value="Fiji">Fiji</option>
						<option name="l" value="Finland">Finland</option>
						<option name="l" value="France">France</option>
						<option name="l" value="French Guiana">French Guiana</option>
						<option name="l" value="French Polynesia">French Polynesia</option>
						<option name="l" value="French Southern Ter">French Southern Ter</option>
						<option name="l" value="Gabon">Gabon</option>
						<option name="l" value="Gambia">Gambia</option>
						<option name="l" value="Georgia">Georgia</option>
						<option name="l" value="Germany">Germany</option>
						<option name="l" value="Ghana">Ghana</option>
						<option name="l" value="Gibraltar">Gibraltar</option>
						<option name="l" value="Great Britain">Great Britain</option>
						<option name="l" value="Greece">Greece</option>
						<option name="l" value="Greenland">Greenland</option>
						<option name="l" value="Grenada">Grenada</option>
						<option name="l" value="Guadeloupe">Guadeloupe</option>
						<option name="l" value="Guam">Guam</option>
						<option name="l" value="Guatemala">Guatemala</option>
						<option name="l" value="Guinea">Guinea</option>
						<option name="l" value="Guyana">Guyana</option>
						<option name="l" value="Haiti">Haiti</option>
						<option name="l" value="Hawaii">Hawaii</option>
						<option name="l" value="Honduras">Honduras</option>
						<option name="l" value="Hong Kong">Hong Kong</option>
						<option name="l" value="Hungary">Hungary</option>
						<option name="l" value="Iceland">Iceland</option>
						<option name="l" value="India">India</option>
						<option name="l" value="Indonesia">Indonesia</option>
						<option name="l" value="Iran">Iran</option>
						<option name="l" value="Iraq">Iraq</option>
						<option name="l" value="Ireland">Ireland</option>
						<option name="l" value="Isle of Man">Isle of Man</option>
						<option name="l" value="Israel">Israel</option>
						<option name="l" value="Italy">Italy</option>
						<option name="l" value="Jamaica">Jamaica</option>
						<option name="l" value="Japan">Japan</option>
						<option name="l" value="Jordan">Jordan</option>
						<option name="l" value="Kazakhstan">Kazakhstan</option>
						<option name="l" value="Kenya">Kenya</option>
						<option name="l" value="Kiribati">Kiribati</option>
						<option name="l" value="Korea North">Korea North</option>
						<option name="l" value="Korea Sout">Korea South</option>
						<option name="l" value="Kuwait">Kuwait</option>
						<option name="l" value="Kyrgyzstan">Kyrgyzstan</option>
						<option name="l" value="Laos">Laos</option>
						<option name="l" value="Latvia">Latvia</option>
						<option name="l" value="Lebanon">Lebanon</option>
						<option name="l" value="Lesotho">Lesotho</option>
						<option name="l" value="Liberia">Liberia</option>
						<option name="l" value="Libya">Libya</option>
						<option name="l" value="Liechtenstein">Liechtenstein</option>
						<option name="l" value="Lithuania">Lithuania</option>
						<option name="l" value="Luxembourg">Luxembourg</option>
						<option name="l" value="Macau">Macau</option>
						<option name="l" value="Macedonia">Macedonia</option>
						<option name="l" value="Madagascar">Madagascar</option>
						<option name="l" value="Malaysia">Malaysia</option>
						<option name="l" value="Malawi">Malawi</option>
						<option name="l" value="Maldives">Maldives</option>
						<option name="l" value="Mali">Mali</option>
						<option name="l" value="Malta">Malta</option>
						<option name="l" value="Marshall Islands">Marshall Islands</option>
						<option name="l" value="Martinique">Martinique</option>
						<option name="l" value="Mauritania">Mauritania</option>
						<option name="l" value="Mauritius">Mauritius</option>
						<option name="l" value="Mayotte">Mayotte</option>
						<option name="l" value="Mexico">Mexico</option>
						<option name="l" value="Midway Islands">Midway Islands</option>
						<option name="l" value="Moldova">Moldova</option>
						<option name="l" value="Monaco">Monaco</option>
						<option name="l" value="Mongolia">Mongolia</option>
						<option name="l" value="Montserrat">Montserrat</option>
						<option name="l" value="Morocco">Morocco</option>
						<option name="l" value="Mozambique">Mozambique</option>
						<option name="l" value="Myanmar">Myanmar</option>
						<option name="l" value="Nambia">Nambia</option>
						<option name="l" value="Nauru">Nauru</option>
						<option name="l" value="Nepal">Nepal</option>
						<option name="l" value="Netherland Antilles">Netherland Antilles</option>
						<option name="l" value="Netherlands">Netherlands (Holland, Europe)</option>
						<option name="l" value="Nevis">Nevis</option>
						<option name="l" value="New Caledonia">New Caledonia</option>
						<option name="l" value="New Zealand">New Zealand</option>
						<option name="l" value="Nicaragua">Nicaragua</option>
						<option name="l" value="Niger">Niger</option>
						<option name="l" value="Nigeria">Nigeria</option>
						<option name="l" value="Niue">Niue</option>
						<option name="l" value="Norfolk Island">Norfolk Island</option>
						<option name="l" value="Norway">Norway</option>
						<option name="l" value="Oman">Oman</option>
						<option name="l" value="Pakistan">Pakistan</option>
						<option name="l" value="Palau Island">Palau Island</option>
						<option name="l" value="Palestine">Palestine</option>
						<option name="l" value="Panama">Panama</option>
						<option name="l" value="Papua New Guinea">Papua New Guinea</option>
						<option name="l" value="Paraguay">Paraguay</option>
						<option name="l" value="Peru">Peru</option>
						<option name="l" value="Phillipines">Philippines</option>
						<option name="l" value="Pitcairn Island">Pitcairn Island</option>
						<option name="l" value="Poland">Poland</option>
						<option name="l" value="Portugal">Portugal</option>
						<option name="l" value="Puerto Rico">Puerto Rico</option>
						<option name="l" value="Qatar">Qatar</option>
						<option name="l" value="Republic of Montenegro">Republic of
							Montenegro</option>
						<option name="l" value="Republic of Serbia">Republic of Serbia</option>
						<option name="l" value="Reunion">Reunion</option>
						<option name="l" value="Romania">Romania</option>
						<option name="l" value="Russia">Russia</option>
						<option name="l" value="Rwanda">Rwanda</option>
						<option name="l" value="St Barthelemy">St Barthelemy</option>
						<option name="l" value="St Eustatius">St Eustatius</option>
						<option name="l" value="St Helena">St Helena</option>
						<option name="l" value="St Kitts-Nevis">St Kitts-Nevis</option>
						<option name="l" value="St Lucia">St Lucia</option>
						<option name="l" value="St Maarten">St Maarten</option>
						<option name="l" value="St Pierre &amp; Miquelon">St Pierre &amp;
							Miquelon</option>
						<option name="l" value="St Vincent &amp; Grenadines">St Vincent
							&amp; Grenadines</option>
						<option name="l" value="Saipan">Saipan</option>
						<option name="l" value="Samoa">Samoa</option>
						<option name="l" value="Samoa American">Samoa American</option>
						<option name="l" value="San Marino">San Marino</option>
						<option name="l" value="Sao Tome &amp; Principe">Sao Tome &amp;
							Principe</option>
						<option name="l" value="Saudi Arabia">Saudi Arabia</option>
						<option name="l" value="Senegal">Senegal</option>
						<option name="l" value="Serbia">Serbia</option>
						<option name="l" value="Seychelles">Seychelles</option>
						<option name="l" value="Sierra Leone">Sierra Leone</option>
						<option name="l" value="Singapore">Singapore</option>
						<option name="l" value="Slovakia">Slovakia</option>
						<option name="l" value="Slovenia">Slovenia</option>
						<option name="l" value="Solomon Islands">Solomon Islands</option>
						<option name="l" value="Somalia">Somalia</option>
						<option name="l" value="South Africa">South Africa</option>
						<option name="l" value="Spain">Spain</option>
						<option name="l" value="Sri Lanka">Sri Lanka</option>
						<option name="l" value="Sudan">Sudan</option>
						<option name="l" value="Suriname">Suriname</option>
						<option name="l" value="Swaziland">Swaziland</option>
						<option name="l" value="Sweden">Sweden</option>
						<option name="l" value="Switzerland">Switzerland</option>
						<option name="l" value="Syria">Syria</option>
						<option name="l" value="Tahiti">Tahiti</option>
						<option name="l" value="Taiwan">Taiwan</option>
						<option name="l" value="Tajikistan">Tajikistan</option>
						<option name="l" value="Tanzania">Tanzania</option>
						<option name="l" value="Thailand">Thailand</option>
						<option name="l" value="Togo">Togo</option>
						<option name="l" value="Tokelau">Tokelau</option>
						<option name="l" value="Tonga">Tonga</option>
						<option name="l" value="Trinidad &amp; Tobago">Trinidad &amp;
							Tobago</option>
						<option name="l" value="Tunisia">Tunisia</option>
						<option name="l" value="Turkey">Turkey</option>
						<option name="l" value="Turkmenistan">Turkmenistan</option>
						<option name="l" value="Turks &amp; Caicos Is">Turks &amp; Caicos
							Is</option>
						<option name="l" value="Tuvalu">Tuvalu</option>
						<option name="l" value="Uganda">Uganda</option>
						<option name="l" value="Ukraine">Ukraine</option>
						<option name="l" value="United Arab Erimates">United Arab Emirates</option>
						<option name="l" value="United Kingdom">United Kingdom</option>
						<option name="l" value="United States of America">United States of
							America</option>
						<option name="l" value="Uraguay">Uruguay</option>
						<option name="l" value="Uzbekistan">Uzbekistan</option>
						<option name="l" value="Vanuatu">Vanuatu</option>
						<option name="l" value="Vatican City State">Vatican City State</option>
						<option name="l" value="Venezuela">Venezuela</option>
						<option name="l" value="Vietnam">Vietnam</option>
						<option name="l" value="Virgin Islands (Brit)">Virgin Islands
							(Brit)</option>
						<option name="l" value="Virgin Islands (USA)">Virgin Islands (USA)</option>
						<option name="l" value="Wake Island">Wake Island</option>
						<option name="l" value="Wallis &amp; Futana Is">Wallis &amp;
							Futana Is</option>
						<option name="l" value="Yemen">Yemen</option>
						<option name="l" value="Zaire">Zaire</option>
						<option name="l" value="Zambia">Zambia</option>
						<option name="l" value="Zimbabwe">Zimbabwe</option>
						<option name="l" value="Weitere">Weitere</option>
				</select></td>
			</tr>
		</table>
		<p class="break"></p>
		<div id="avatar">
			<h3>Avatar:</h3>
			<?php 	$avatarPic = 1;						
					for ($avatarPic = 1; $avatarPic <= 6; $avatarPic++) {
			?>
						<div class="avatarpic">
				<input type="radio" name="avatar"
					value="ava0<?php echo $avatarPic;?>.jpg" required="required"
					id="<?php echo $avatarPic;?>"
					<?php 	if ($avatar == 'ava0'.$avatarPic.'.jpg') {  // Prüft ob Avatar in der Datenbank ausgewählt ist
												echo 'checked="checked"'; 
											}														
									?>> <label for="<?php echo $avatarPic;?>"><span><span></span></span><img
					src="img/avatar/ava0<?php echo $avatarPic;?>.jpg" alt=bild "/></label>
			</div>
					
			<?php };
			$avatarPic3 = 10;
			if ($rang == "Quizprofi") {
				
				for ($avatarPic3 = 10; $avatarPic3 <= 11; $avatarPic3++) {
					?>
				<div class="avatarpic">
					<input type="radio" name="avatar" value="ava<?php echo $avatarPic3;?>.png" required="required" id="<?php echo $avatarPic3;?>"> 
					<label for="<?php echo $avatarPic3;?>"><span><span></span></span><img
					src="img/avatar/ava<?php echo $avatarPic3;?>.png" alt="bild "/></label>
			</div>
				
				
			<?php 
				}
			};
			$avatarPic2 = 10;
			if ($rang == "Quizmaster") {
				
				for ($avatarPic2 = 10; $avatarPic2 <= 12; $avatarPic2++) {
					?>
				<div class="avatarpic">
					<input type="radio" name="avatar" value="ava<?php echo $avatarPic2;?>.png" required="required" id="<?php echo $avatarPic2;?>"> 
					<label for="<?php echo $avatarPic2;?>"><span><span></span></span><img
					src="img/avatar/ava<?php echo $avatarPic2;?>.png" alt="bild "/></label>
			</div>
				
				
			<?php 
				}
			};
			?>
			<br />
		</div>
		<p class="break"></p>
		<input type="submit" value="Speichern"><input type="button"
			value="Abbrechen" onclick="location='?site=profile'">
	</form>
</div>

<p class="break"></p>

<div id="delete">
	<h3>
		M&ouml;chtest Du dein Profil wirklich l&ouml;schen? Gebe daf&uuml;r JA
		ein
		<form class="loeschen" action="sites/delete.php" method="post">

			<input type="hidden" name="username" id="username"
				value="<?php echo $username?>" readonly="readonly"> <input
				type="text" name="delete" value="" placeholder="JA"> <input
				type="submit" value="Goodbye">
	
	</h3>
</div>