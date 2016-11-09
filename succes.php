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
    <p>U bent niet ingelogd.<a href='inloggen.php'> Login</a>\n</p>\n;
    </content>";
include ('includes/footer.html');
exit;
} else {
?>

				
						<h2><b>Succes!</b></h2>
					</header>
					
					<content>
						<br><p><b>Uw foto's zijn succesvol geüpload!</b></p><br>
						Klik <a href="addphoto.php">hier</a> om meer foto's te uploaden of<br>
						Klik <a href="account.php">hier</a> om terug te gaan naar de accountpagina.<br><br>

					</content>
				</article>
					
</div>

<?php	
}
include ('includes/footer.html');

?>