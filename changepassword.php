<?php	
session_start();
include ('includes/header.html');
include ('php/connection.php');
require ("lib/password.php");
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
	echo "<h2><b>Wachtwoord Wijzigen</b></h2><br>";
echo "</header>
	  <content>";

	$email = $_SESSION['myemail'];
}
?>
			<form name="form1" method="post" action="changepassword.php" class="formulier">

				<label>Oude wachtwoord</label>
				<input name="oldpass" type="password" id="oldpass"> <br />

				<label>Nieuw wachtwoord</label>
				<input name="mypassword" type="password" id="mypassword"> <br />
				<label>Bevestig nieuw wachtwoord</label>
				<input name="mypassword2" type="password" id="mypassword2"> <br />
<br>&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" name="Submit" value="Bevestig" class="btn btn-confirm">
			</form>
<?php

if ( $_SERVER['REQUEST_METHOD'] == 'POST' &&
    isset($_POST['oldpass'], $_POST['mypassword'], $_POST['mypassword2']) )
{

if($_POST['mypassword'] != $_POST['mypassword2']){
	echo "De nieuwe wachtwoorden komen niet overeen, probeer opnieuw";
} else {

// de query voor het ophalen van de klantgegevens
	$sql = "SELECT password FROM users WHERE email = '".$email."'";
	// Voer de query uit en sla het resultaat op 
	$link = mysqli_connect($host, $user, $password, $database);
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$passquery = $row['password'];
	$passpostold = $_POST['oldpass'];

if($passquery == $passpostold || password_verify($passpostold, $passquery)){
	
$password = $_POST['mypassword'];
$hash = password_hash($password, PASSWORD_BCRYPT);


$sql= "UPDATE users SET password = '".$hash."', Timestamp = CURRENT_TIMESTAMP WHERE email = '".$email."'";
$result = mysqli_query($link, $sql);

if ($result === true) { 
    
    echo "<b>Wachtwoord gewijzigd</b>"; 
} else { 

    echo "Er is helaas iets mis gegaan, neem alstublieft contact op met de webmaster.";
} 

} else {
echo "Het oude wachtwoord is niet correct, probeer opnieuw";


}	
}
}

?>
					</content>
				</article>
					
</div>

<?php	

include ('includes/footer.html');

?>