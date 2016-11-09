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
$sql = "DELETE FROM text_reports WHERE id = ?";
$result = mysqli_query($link, $sql);

?>
						
					</header>
<?php

if (!isset($_GET['id']))
{
    echo 'Er is geen verslag geselecteerd';
    exit;
}

//verwijdert het item uit de database

if (!$result = $link->prepare($sql))
{
    die('Query failed: (' . $link->errno . ') ' . $link->error);
    echo "Er is iets fout gegaan met verwijderen, probeer alstublieft opnieuw.";
}

// wat controles voor het verwijderen van het product
if (!$result->bind_param('i', $_GET['id']))
{
    die('Binding parameters failed: (' . $result->errno . ') ' . $result->error);
    echo "Er is iets fout gegaan met verwijderen, probeer alstublieft opnieuw.";
}

if (!$result->execute())
{
    die('Execute failed: (' . $result->errno . ') ' . $result->error);
    echo "Er is iets fout gegaan met verwijderen, probeer alstublieft opnieuw.";
}

if ($result->affected_rows > 0)
{
    echo "<p><b>Het verwijderen van het verslag is gelukt!</b></p>";
}
else
{
    echo "Er is iets fout gegaan met verwijderen, probeer alstublieft opnieuw.";
}

?>

<meta http-equiv="refresh" content="3;url=verslagenoverzicht.php" />
<?php echo "<p><b>U wordt terug gebracht naar het verslagenoverzicht</b></p><br>";

}
/* maak de resultset leeg */
mysqli_free_result($result);

/* sluit de connection */
mysqli_close($link);
?>

					<content>
					</content>
				</article>
					
</div>

<?php	

include ('includes/footer.html');

?>