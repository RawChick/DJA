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
} else {
$link = mysqli_connect($host, $user, $password, $database);
$sql2 = "SELECT email, function FROM users WHERE email = '".$_SESSION['myemail']."'";
$result2 = mysqli_query($link, $sql2);
$row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$function = $row['function']; 
if ($function == 'Admin' || $function == 'LedenAdministratie'){

?>
						<h2><b>Voeg verjaardag toe</b></h2>
					</header>
					
					<content>
          
						<p><br>

							<form action="addbirthday.php" method="post" class="formulier">
  <?php	
if ( $_SERVER['REQUEST_METHOD'] == 'POST' &&
    isset($_POST['dateofbirth'], $_POST['lastname'], $_POST['firstname']) )
{
    

// foutmeldigen worden in een array opgeslagen
    $aErrors = array();

    //  De activiteit moet ingevuld zijn
    if ( !isset($_POST['firstname']) or empty($_POST['firstname'])) {
        $aErrors['firstname'] = 'U heeft geen voornaam ingevuld';
    }
    //  De activiteit moet ingevuld zijn
    if ( !isset($_POST['lastname']) or empty($_POST['lastname'])) {
        $aErrors['lastname'] = 'U heeft geen achternaam ingevuld';
    }
// de geboortedatum moet ingevuld zijn
    if ( !isset($_POST['dateofbirth'])) {
        $aErrors['dateofbirth'] = 'De geboortedatum is niet ingevuld';
    }

    // een datum met opgeslagen worden als DD-MM-JJJJ
    if (!preg_match('~^(31|30|[0-2]?[0-9])-(10|11|12|0?[0-9])-(19|20)[0-9]{2}$~', $_POST['dateofbirth'] ) ) {
        $aErrors['dateofbirth'] = 'Vul een geldige geboortedatum in';
    }
}

  if ( isset($aErrors) and count($aErrors) > 0 ) {
        print '<ul class="errorlist">';
        foreach ( $aErrors as $error ) {
            print '<li>' . $error . '</li>';
        }
        print '</ul>';
  }

  if ( isset($aErrors) && count($aErrors) == 0)
{
    
function adds($string) 
{ 
 if (get_magic_quotes_gpc()){
 $result = stripslashes(addslashes($string));
 } 
 else 
 { 
 $result = addslashes($string);}
 return $result;
} 

$link = mysqli_connect($host, $user, $password, $database);

$getdateofbirth = $_POST['dateofbirth'];
$getlastname = addslashes($_POST['lastname']);
$getfirstname = addslashes($_POST['firstname']);

$formatdateofbirth = DateTime::createFromFormat('d-m-Y', $getdateofbirth);
$dateofbirth = $formatdateofbirth->format('Y-m-d');



$query = "INSERT INTO birthday (firstname, lastname, dateofbirth) VALUES('$getfirstname', '$getlastname', '$dateofbirth')";
$result = mysqli_query($link, $query);

          
if ($result === true) { 
    
    echo "<b>Verjaardag toegevoegd</b>"; 
} else { 
    echo "Er is helaas iets mis gegaan, neem alstublieft contact op met de webmaster.";
} 



}

  ?>
  <p>Vul het onderstaande formulier in. De velden met een <em>* </em> zijn verplicht.</p>
<br>
  <fieldset>
    <legend>Nieuwe verjaardag</legend>
   
    <ol>
      <?php echo isset($aErrors['firstname']) ? '<li class="error">' : '<li>' ?>
        <label for="adres">Voornaam<em>*</em></label>
        <input id="firstname" name="firstname" value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '' ?>" />
      </li>
      <?php echo isset($aErrors['lastname']) ? '<li class="error">' : '<li>' ?>
        <label for="lastname">Achternaam<em>*</em></label>
        <input id="lastname" name="lastname" value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : '' ?>" />
      </li>
       <?php echo isset($aErrors['dateofbirth']) ? '<li class="error">' : '<li>' ?>
        <label for="dateofbirth">Geboortedatum<em>*</em></label>
        <input id="dateofbirth" name="dateofbirth" value="<?php echo isset($_POST['dateofbirth']) ? htmlspecialchars($_POST['dateofbirth']) : '' ?>" />DD-MM-JJJJ
      </li>

    </ol>
    <input type="submit" value="Verstuur" class="button"/>
  </fieldset>
</form>
<?php }else { 
    echo "<b>U heeft niet de juiste rechten om deze pagina te bezoeken</b>";
    }

} ?>
					</content>
				</article>
					
</div>

<?php	

include ('includes/footer.html');

?>