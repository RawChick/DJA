<?php	

include ('includes/header.html');

?>

<div class= "bottomcontent">

				<article class="mainbar">	
					<header>
						<h2><b>Voeg agenda-items toe</b></h2>
					</header>
					
					<content>
						<p></br>

							<form action="addagenda.php" method="post" class="formulier">
  <?php	
if ( $_SERVER['REQUEST_METHOD'] == 'POST' &&
    isset($_POST['begindate'], $_POST['enddate'], $_POST['activity']) )
{
    

// foutmeldigen worden in een array opgeslagen
    $aErrors = array();

    //  De activiteit moet ingevuld zijn
    if ( !isset($_POST['activity']) or empty($_POST['activity'])) {
        $aErrors['activity'] = 'U heeft geen activiteit ingevuld';
    }

// de begindatum moet ingevuld zijn
    if ( !isset($_POST['begindate'])) {
        $aErrors['begindate'] = 'De begindatum is niet ingevuld';
    }

    // een datum met opgeslagen worden als DD-MM-JJJJ
    if (!preg_match('~^(31|30|[0-2]?[0-9])-(10|11|12|0?[0-9])-(19|20)[0-9]{2}$~', $_POST['begindate'] ) ) {
        $aErrors['begindate'] = 'Vul een geldige begindatum in';
    }


    if (!empty($_POST['enddate']) AND !preg_match('~^(31|30|[0-2]?[0-9])-(10|11|12|0?[0-9])-(19|20)[0-9]{2}$~', $_POST['enddate'] ) ) {
        $aErrors['enddate'] = 'Vul een geldige einddatum in';
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


$getbegindate = $_POST['begindate'];
$getenddate = $_POST['enddate'];
$getactivity = mysqli_real_escape_string($conn, $_POST['activity']);

$formatbegindate = DateTime::createFromFormat('d-m-Y', $getbegindate);
$begindate = $formatbegindate->format('Y-m-d');

if(!empty($_POST['enddate'])){
	$formatenddate = DateTime::createFromFormat('d-m-Y', $getenddate);
$enddate = $formatenddate->format('Y-m-d');
} else {
	$enddate = $begindate;
}


$sql =  "INSERT INTO agenda (
begindate, 
enddate, 
activity
)
       VALUES('$begindate', '$enddate', '$getactivity')";

          
if ($conn->query($sql) === TRUE) { 
    
    echo "<b>Agenda-Item toegevoegd</b>"; 
} else { 
    echo "Error: " . $sql . "<br>" . $conn->error; 
    echo "Er is helaas iets mis gegaan, neem alstublieft contact op met de webmaster.";
} 



}

  ?>
  <p>Vul het onderstaande formulier in. De velden met een <em>* </em> zijn verplicht.</p>
</br>
  <fieldset>
    <legend>Uw gegevens</legend>
   
    <ol>
      <?php echo isset($aErrors['begindate']) ? '<li class="error">' : '<li>' ?>
        <label for="begindate">Begindatum<em>*</em></label>
        <input id="begindate" name="begindate" value="<?php echo isset($_POST['begindate']) ? htmlspecialchars($_POST['begindate']) : '' ?>" />
      </li>
      
      <?php echo isset($aErrors['enddate']) ? '<li class="error">' : '<li>' ?>
        <label for="enddate">Einddatum </label>
        <input id="enddate" name="enddate" value="<?php echo isset($_POST['enddate']) ? htmlspecialchars($_POST['enddate']) : '' ?>" />
      </li>
      <?php echo isset($aErrors['activity']) ? '<li class="error">' : '<li>' ?>
        <label for="adres">Activiteit<em>*</em></label>
        <textarea id="activity" rows="3" cols="34" name="activity" value="<?php echo isset($_POST['activity']) ? htmlspecialchars($_POST['activity']) : '' ?>" /></textarea>
      </li>

    </ol>
    <input type="submit" value="Verstuur" class="button"/>
  </fieldset>
</form>
					</content>
				</article>
					
</div>

<?php	

include ('includes/footer.html');

?>