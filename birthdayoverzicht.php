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
include('php/connection.php');

$link = mysqli_connect($host, $user, $password, $database);
$sql2 = "SELECT email, function FROM users WHERE email = '".$_SESSION['myemail']."'";
$result2 = mysqli_query($link, $sql2);
$row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$function = $row['function']; 
if ($function == 'Admin' || $function == 'LedenAdministratie'){

$query = "SELECT ID, firstname, lastname, dateofbirth FROM birthday ORDER BY lastname ASC";
$result = mysqli_query($link, $query);
setlocale(LC_TIME, array('nl_NL.UTF-8','nl_NL@euro','nl_NL','dutch'));
?>
						<h2><b>Verjaardagen overzicht</b></h2>
					</header>

<br>

Alle leden staan alfabetisch gesorteerd op achternaam.<br><br>
<table width='100%'>

 <?php

      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
$time = strtotime($row["dateofbirth"]);
$myDate = date($time );
        echo "
        <tr>
        <td>
      <a href='modifybirthday.php?id=".$row['ID']."'><img src='images/modify.png' width='25px'></a>
        </td>
        <td>
      <a href='deletebirthday.php?id=".$row['ID']."'><img src='images/delete_icon.png' width='25px'></a>
        </td>
        <td>
        ".$row['firstname']."
        </td>
        <td>
        ".$row['lastname']."
        </td>
        <td width='60%'>
        ".strftime("%#d-%m-%Y", $myDate)."
        </td></tr>
      ";}
echo "</table>";
} else { 
    echo "<b>U heeft niet de juiste rechten om deze pagina te bezoeken</b>";
    }
}
?>

				</article>
					
</div>

<?php	

include ('includes/footer.html');

?>