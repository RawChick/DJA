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
	$sql2 = "SELECT email, function FROM users WHERE email = '".$_SESSION['myemail']."'";
$result2 = mysqli_query($link, $sql2);
$row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$function = $row['function']; 
if ($function == 'Admin' || $function == 'Bestuur'){
?>
						<h2><b>Voeg bestuursmededeling toe</b></h2>
					</header>
<?php
if ( $_SERVER['REQUEST_METHOD'] == 'POST' &&
	isset($_POST['titel'], $_POST['noise'])){
	
  $aErrors = array();

 if ( !isset($_POST['noise']) or empty($_POST['noise'])) {
        $aErrors['noise'] = 'U heeft geen verslag ingevuld';
    }

 if ( !isset($_POST['titel']) or empty($_POST['titel'])) {
        $aErrors['titel'] = 'U heeft geen titel ingevuld';
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


$text = addslashes($_POST['noise']);
$titel = addslashes($_POST['titel']);
$link = mysqli_connect($host, $user, $password, $database);
$query = "INSERT INTO management(titel, article) VALUES ('$titel', '$text');";
$result = mysqli_query($link, $query);
if ($result === true) { 
    
    echo "<b><h4><u>Mededeling toegevoegd</u></h4></b>"; 
} else { 
    echo "Er is helaas iets mis gegaan, neem alstublieft contact op met de webmaster.";
} 

}
}
?>
					<content>
						<form action="addmanagement.php" method="post" class="formulier">
				<br>
			
				 <?php echo isset($aErrors['titel']) ? '<li class="error">' : '<li>' ?>
				<label><big><b>Titel</b></big></label>
				<input name="titel" type="text" id="titel"><br><br>
					</li>
					 <?php echo isset($aErrors['noise']) ? '<li class="error">' : '<li>' ?>
					<label><big><b>Nieuws</b></big></label>
				<textarea id="noise" name="noise" class="widgEditor"></textarea>
				</li>
			
				<input type="submit" value="Opslaan" />
			
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