<?php
include ('../includes/header2.html');
include ('connection.php');
require ("../lib/password.php");

$link = mysqli_connect($host, $user, $password, $database);

echo "
<div class= 'bottomcontent'>
<article class='mainbar'>	
<content>";


if ( $_SERVER['REQUEST_METHOD'] == 'POST' &&
    isset($_POST['firstname'], $_POST['lastname'], $_POST['email1'], $_POST['pass1']) )
{
if( !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email1']) && !empty($_POST['pass1']) ){

// data from the post
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email1'];
$function = $_POST['function'];
$password = $_POST['pass1'];
$hash = password_hash($password, PASSWORD_BCRYPT);

//insert the user into the database
$sql = "INSERT INTO `users` (`email`, `password`, `function`, `firstname`, `lastname`) 
 VALUES ('$email', '$hash', '$function', '$firstname', '$lastname');";

if (mysqli_query($link, $sql) == true) {
	echo"<br> Registratie is voltooid. De admins van dja-zundert gaan uw registratie beoordelen.<br>
	U krijgt een mail wanneer u toegang heeft gekregen tot de website.<br><br>
	<a href='../index.php'><b>Terug naar home</b></a>";


		$email_to = "dja.zundert@gmail.com";
 
    	$email_subject = "Cilia: nieuwe registratie DJA";

        $email_message .= "\n".$firstname." ".$lastname." heeft zich zojuist geregistreerd op de website.\n\n";
    	$email_message .= "Log in op www.dja-zundert.nl/inloggen.php en ga dan naar het 'User overzicht' om deze persoon te accepteren of te weigeren.\n";
 		$email_message .= "\n\n\n\n\n\n";
 		$email_message .= "LET OP: Dit bericht is verzonden door een geautomatiseerd systeem. Reacties op dit bericht worden niet gelezen of doorgestuurd.";

    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
 
// create email headers
 $noreply = "noreply@dja-zundert.nl";
$headers = 'From:'.$noreply."\r\n".
'Reply-To: '.$noreply."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);  


} else {
    
	echo "Error: " . $sql . "<br>" . mysqli_error($link);
}


} else {
	echo "<br>U heeft niet alle velden ingevoerd, ga terug en probeer opnieuw. <br><br>
	<a href = '../register.php'><b>Terug</b></a><br><br>";
}
}
echo"
</content>
</article>			
</div>
";	

include ('../includes/footer2.html');
?>