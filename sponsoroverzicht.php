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
if ($function == 'Admin'|| $function == 'SponsorCommisie'){

$query = "SELECT id, paths, url FROM sponsorbar ORDER BY datum DESC";
$result = mysqli_query($link, $query);

?>
						<h2><b>Sponsor overzicht</b></h2>
					</header>

<table width='100%'>

 <?php

      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

        echo "
        <tr>
        <td>
      <a href='deletesponsor.php?id=".$row['id']."'><img src='images/delete_icon.png' width='25px'></a>
        </td>
        <td>
        <img src='images/sponsors/".$row['paths']."' height='75px'>
        </td>
        <td width='60%'>
        ".$row['url']."
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