<?php	

include ('includes/header.html');

?>

<div class= "bottomcontent">

	<article class="mainbar">	
		<header>
			<h2><b>Registratie</b></h2>
		</header>
				
		<form name="form1" method="post" class="formulier" action="php/register_new.php">
						
				<label>Voornaam</label>
				<input type="text" name="firstname" id="firstname" value="">				
		<br>
				<label>Achternaam</label>
				<input type="text" name="lastname" id="lastname" value="">							
	<br>
				<label>Email Adres</label>
				<input type="email" name="email1" id="email1" value="">
		<br>
				<label>Functie</label>
				 <select name="function">
				 	<option value="Admin">Admin</option>
				 	<option value="Bestuur">Bestuur</option>
				 	<option value="ClubRecords">ClubRecords</option>
				 	<option value="LedenAdministratie">LedenAdministratie</option>
				    <option value="RSC">RSC</option>
				    <option value="SponsorCommisie">SponsorCommisie </option>
				    <option value="Trainer"> Trainer </option>
				   
				    
				 </select>
						
	<br>
				<label>Wachtwoord</label>
				<input type="password" name="pass1" id="pass1" value="">
	
		<br>&nbsp;&nbsp;&nbsp;&nbsp;
				<button type="submit">Aanmelden</button>
<br><br>
					Na aanmelden moet de webbeheerder de aanmelding eerst verifiëren.<br>
		Pas daarna kan er ingelogd worden.
		

		</form>
		</div>
	</article>
					
</div>

<?php	

include ('includes/footer.html');

?>

