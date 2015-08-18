<?php	

include ('includes/header.html');

?>

<div class= "bottomcontent">

	<article class="mainbar">	
		<header>
			<h2><b>Registratie</b></h2>
		</header>
				
		<form name="form1" method="post" action="php/register_new.php">
						
			<div class="form-group span5">
				<label>Voornaam</label>
				<input type="text" name="firstname" class="form-control" id="firstname" value="">
			</div>
							
			<div class="form-group span5">
				<label>Achternaam</label>
				<input type="text" name="lastname" class="form-control" id="lastname" value="">
			</div>
											
			<div class="form-group span5">
				<label>Email Adres</label>
				<input type="email" name="email1" class="form-control" id="email1" value="">
			</div>
							
			<div class="form-group span5">
				<label>Functie</label>
				 <select name="function">
				     <option value="1"> Trainer </option>
				     <option value="Admin">Admin</option>
				     <option value="LedenAdministratie">LedenAdministratie</option>
				     <option value="ClubRecords">ClubRecords</option>
				     <option value="SponsorCommisie">SponsorCommisie </option>
				     <option value="Bestuur">Bestuur</option>
				 </select>
			</div>
							
			<div class="form-group span5">
				<label>Wachtwoord</label>
				<input type="password" name="pass1" class="form-control" id="pass1" value="">
			</div>
							
							
			<div class="form-group span12">
				<button type="submit" class="btn btn-primary">Aanmelden</button>
			</div>

		</form>
		</div>
	</article>
					
</div>

<?php	

include ('includes/footer.html');

?>

