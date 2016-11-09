<?php	
session_start();
include ('includes/header.html');

?>

<div class= "bottomcontent">

				<article class="mainbar">	
					<header>
            <?php
 if (empty($_SESSION['myemail'])) {
    echo "<h2><b> Inloggen</b> </h2><br></header>
    <content>
    <p>U bent niet ingelogd.<a href='inloggen.php'> Login</a>\n</p>\n";
include ('includes/footer.html');
} else {
include('php/connection.php');

$link = mysqli_connect($host, $user, $password, $database);
$sql2 = "SELECT email, function FROM users WHERE email = '".$_SESSION['myemail']."'";
$result2 = mysqli_query($link, $sql2);
$row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$function = $row['function']; 
if ($function == 'Admin'){

$sql = " UPDATE users SET actief = 'Actief' WHERE id = ?";
$result = mysqli_query($link, $sql);

?>
						
					</header>
<?php

if (!isset($_GET['id']))
{
    echo 'Er is geen user geselecteerd';
    exit;
}

//verwijdert het item uit de database

if (!$result = $link->prepare($sql))
{
    die('Query failed: (' . $link->errno . ') ' . $link->error);
    echo "Er is iets fout gegaan met accepteren, probeer alstublieft opnieuw.";
}

// wat controles voor het accepteren van het product
if (!$result->bind_param('i', $_GET['id']))
{
    die('Binding parameters failed: (' . $result->errno . ') ' . $result->error);
    echo "Er is iets fout gegaan met accepteren, probeer alstublieft opnieuw.";
}

if (!$result->execute())
{
    die('Execute failed: (' . $result->errno . ') ' . $result->error);
    echo "Er is iets fout gegaan met accepteren, probeer alstublieft opnieuw.";
}

if ($result->affected_rows > 0)
{
    echo "<p><b>Het accepteren van de user is gelukt!</b></p>";

$sql3 = "SELECT email FROM users WHERE id = ".$_GET['id'];
$result3 = mysqli_query($link, $sql3);
$rij = mysqli_fetch_array($result3, MYSQLI_ASSOC);

    $email_to = $rij['email'];
 
    $email_subject = "Toegang dja-zundert.nl";

        $email_message .= "Uw account is op actief gezet door de beheerders van De Jonge Athleet\n";
    	$email_message .= "U kunt vanaf nu inloggen op www.dja-zundert.nl\n";;
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
 
// create email headers
 
$headers = 'From: '.$_SESSION['myemail']."\r\n".
'Reply-To: '.$_SESSION['myemail']."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);  

}
else
{
    echo "Er is iets fout gegaan met accepteren, probeer alstublieft opnieuw.";
}

?>

<meta http-equiv="refresh" content="0;url=useroverzicht.php" />
<?php echo "<p><b>U wordt terug gebracht naar het useroverzicht</b></p><br>";

} else { 
		echo "<b>U heeft niet de juiste rechten om deze pagina te bezoeken</b>";
		}

}
?>

					<content>
					</content>
				</article>
					
</div>

<?php	

include ('includes/footer.html');

?>