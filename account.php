<?php	
session_start();
include ('includes/header.html');
include ('php/connection.php');

?>

<div class= "bottomcontent">

				<article class="mainbar">	
					<header>
						<?php
						if (empty($_SESSION['myemail'])) {
	echo "<h2><b> Inloggen</b> </h2><br></header>
	<content>
	<p>U bent niet ingelogd.<a href='inloggen.php'> Login</a>\n</p>\n";
} else {

	$email = $_SESSION['myemail'];

    // de query voor het ophalen van de klantgegevens
	$sql = "SELECT function FROM users WHERE email = '".$email."'";
	// Voer de query uit en sla het resultaat op 
	$link = mysqli_connect($host, $user, $password, $database);
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$function = $row['function']; 

echo "<h2><b>".$function."</b></h2><br>";
echo "</header>
	  <content>";
	  

	if($function == 'Trainer' || $function == 'RSC'){
echo "


<b>Nieuws</b><br>
<a href='addnews.php'>Voeg toe</a><br>
<a href='nieuwsoverzicht.php'>Overzicht en verwijderen</a><br><br>

<b>Agenda</b><br>
<a href='addagenda.php'>Voeg toe</a><br><br>

<b>Fotoalbum</b><br>
<a href='addphoto.php'>Voeg toe</a><br>

<b>Verslagen</b><br>
<a href='addcontent.php'>Voeg toe</a><br>
<a href='verslagenoverzicht.php'>Overzicht en verwijderen</a><br><br>

";
	}
	if($function == 'Admin'){
echo "
<b><a href='useroverzicht.php'>User overzicht</a></b><br><br>

<b>Nieuws</b><br>
<a href='addnews.php'>Voeg toe</a><br>
<a href='nieuwsoverzicht.php'>Overzicht en verwijderen</a><br><br>

<b>Agenda</b><br>
<a href='addagenda.php'>Voeg toe</a><br><br>

<b>Fotoalbum</b><br>
<a href='addphoto.php'>Voeg toe</a><br><br>

<b>Vacatures</b><br>
<a href='addvacancies.php'>Voeg toe</a><br>
<a href='vacatureoverzicht.php'>Overzicht en verwijderen</a><br><br>

<b>Sponsors</b><br>
<a href='addsponsor.php'>Voeg toe</a><br>
<a href='sponsoroverzicht.php'>Overzicht en verwijderen</a><br><br>


<b>Verjaardagen</b><br>
<a href='addbirthday.php'>Voeg toe</a><br>
<a href='birthdayoverzicht.php'>Overzicht en verwijderen</a><br><br>

<b>Verslagen</b><br>
<a href='addcontent.php'>Voeg toe</a><br>
<a href='verslagenoverzicht.php'>Overzicht en verwijderen</a><br><br>


<b>Bestuursmededelingen</b><br>
<a href='addmanagement.php'>Voeg toe</a><br>
<a href='mededelingoverzicht.php'>Overzicht en verwijderen</a><br><br>
		";

		}
	if($function == 'LedenAdministratie'){
echo "
<b>Verjaardagen</b><br>
<a href='addbirthday.php'>Voeg toe</a><br>
<a href='birthdayoverzicht.php'>Overzicht en verwijderen</a><br>		
		";
	}

	if($function == 'ClubRecords'){

	}

	if($function == 'SponsorCommisie'){
echo "
<b>Sponsors</b><br>
<a href='addsponsor.php'>Voeg toe</a><br>
<a href='sponsoroverzicht.php'>Overzicht en verwijderen</a><br>
";
	}


	if($function == 'Bestuur'){
echo "
<b>Nieuws</b><br>
<a href='addnews.php'>Voeg toe</a><br>
<a href='nieuwsoverzicht.php'>Overzicht en verwijderen</a><br><br>

<b>Vacatures</b><br>
<a href='addvacancies.php'>Voeg toe</a><br>
<a href='vacatureoverzicht.php'>Overzicht en verwijderen</a><br><br>


<b>Bestuursmededelingen</b><br>
<a href='addmanagement.php'>Voeg toe</a><br>
<a href='mededelingoverzicht.php'>Overzicht en verwijderen</a><br><br>
		";
	}
	echo "<br><br><a href='changepassword.php'>Wachtwoord wijzigen</a>";
	echo "<br><br><a href='logout.php'><b>Uitloggen</b></a>";
}
?>
					</content>
				</article>
					
</div>

<?php	

include ('includes/footer.html');

?>