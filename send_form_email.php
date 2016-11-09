<?php	

include ('includes/header.html');

?>

<div class= "bottomcontent">

				<article class="mainbar">	
					
					<content>
						<?php

if(!isset($_POST['email'])) {

  echo "er is geen email ingevuld";
  exit;
}else{
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "ostaijenhoof@hetnet.nl";
 
    $email_subject = "Inschrijving ".$_POST['voorletters']." ".$_POST['achternaam'];
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "Er is helaas iets misgegaan met het formulier ";
        echo "Hieronder vindt u de errors.<br /><br />";
        echo $error."<br /><br />";
        echo "Ga alstublieft terug naar de vorige pagina en pas de foute gegevens aan.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['achternaam']) ||
        !isset($_POST['voorletters']) ||
        !isset($_POST['roepnaam']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telefoon']) ||
        !isset($_POST['postcode']) ||
        !isset($_POST['woonplaats']) ||
        !isset($_POST['rekeningnummer']) ||
        !isset($_POST['lid']) ||
        !isset($_POST['geslacht']) ||
        !isset($_POST['adres'])) {
 
        died('Er is helaas iets misgegaan met het formulier.<br>
         Ga alstublieft terug naar de vorige pagina en vul het formulier volledig in.');       
 
    }
 
    $birthday = $_POST['gebdag']."-".$_POST['gebmaand']."-".$_POST['gebjaar'];
 	$gender = $_POST['geslacht'];
    $first_name = $_POST['roepnaam']; // required
    $initials = $_POST['voorletters'];
    $last_name = $_POST['achternaam']; // required
    $postcode = $_POST['postcode'];
    $city = $_POST['woonplaats'];
    $cardnumber = $_POST['rekeningnummer'];
    $lid = $_POST['lid'];
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telefoon']; // not required
    $adres = $_POST['adres']; // required
    $ehbo = $_POST['EHBO'];
    $startdate = $_POST['ingangdag']."-".$_POST['ingangmaand']."-".$_POST['ingangjaar'];
    $reglement = $_POST['reglement'];
    $statuten = $_POST['statuten'];
    $incasso = $_POST['incasso'];
    $socialmedia = $_POST['socialmedia'];
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Gegevens aanmeldformulier.\n\n";
    
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
    $email_message .= "Voorletters: ".clean_string($initials)."\n";
    $email_message .= "Roepnaam: ".clean_string($first_name)."\n";
    $email_message .= "Achternaam: ".clean_string($last_name)."\n";
    $email_message .= "Geslacht: ".clean_string($gender)."\n";
    $email_message .= "Geboortedatum: ".clean_string($birthday)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telefoon: ".clean_string($telephone)."\n";
    $email_message .= "Adres: ".clean_string($adres)."\n";
    $email_message .= "Postcode: ".clean_string($postcode)."\n";
    $email_message .= "Woonplaats: ".clean_string($city)."\n";
    $email_message .= "Rekeningnummer: ".clean_string($cardnumber)."\n";
    $email_message .= "Soort lid: ".clean_string($lid)."\n";
    $email_message .= "Ingangsdatum: ".clean_string($startdate)."\n";
    $email_message .= "EHBO: ".clean_string($ehbo)."\n";
    $email_message .= "Statuten: ".clean_string($statuten)."\n";
    $email_message .= "Reglement: ".clean_string($reglement)."\n";
    $email_message .= "Incasso: ".clean_string($incasso)."\n";
    $email_message .= "Social Media: ".clean_string($socialmedia)."\n"; 
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
Dank u voor het aanmelden, u hoort snel van ons!

<?php
}
?>
					</content>
				</article>
					
</div>

<?php	

include ('includes/footer.html');

?>