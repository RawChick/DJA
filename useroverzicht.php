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


$query = "SELECT id, firstname, lastname, email, function FROM users WHERE actief = 'Non-Actief'";
$result = mysqli_query($link, $query);

?>
            <h2><b>User overzicht</b></h2>
          </header>

<b>Hieronder staan alle personen die zich hebben aangemeld hebben als personeel.<br>
  Klik op het vinkje om iemand te accepteren, of klik op het kruisje om de aanmelding te verwijderen.<br>
  Degene krijgt een e-mail wanneer hij/zij geaccepteerd is.<br>
  PAS OP! Door iemand te accepteren krijgt hij/zij rechten om bepaalde gegevens toe te voegen/verwijderen op de website.<br><br>
     <div class="border">
<table width='90%'>

 <?php
echo"
<tr>
<th>Voornaam</th>
<th>Achternaam</th>
<th>Email</th>
<th>Functie</th>
<th>Accept</th>
<th>Weiger</th>
</tr>
";
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

        echo "
        <tr>
        <td>".$row['firstname']."</td>
        <td>".$row['lastname']."</td>
        <td>".$row['email']."</td>
        <td>".$row['function']."</td>
        <td width='20px'><a href='accept.php?id=".$row['id']."'><img src='images/check_icon.png' width='25px'></a></td>
        <td width='20px'><a href='deny.php?id=".$row['id']."'><img src='images/delete_icon.png' width='25px'></a></td>
        </tr>
      ";}
echo "</table>";
}  else { 
    echo "<b>U heeft niet de juiste rechten om deze pagina te bezoeken</b>";
    }

}
?>
</b>
</div>
          <content>
          </content>
        </article>
          
</div>

<?php 

include ('includes/footer.html');

?>