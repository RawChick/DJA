<?php	
session_start();
	

	if(isset($_SESSION["myemail"])){
			header("location:account.php");
			exit(0);
	}
include ('includes/header.html');
?>

<div class= "bottomcontent">

	<article class="mainbar">	
		<header>
			<h2><b>Account</b></h2>
			<h5>Dit gedeelte van de website is <u><b>alleen voor trainers en bevoegde leden.</b></u><br><br>
				Elke aanmelding wordt door de webbeheerder gecontroleerd voordat er ingelogd kan worden.
</h5><br>
		</header>
			
		<content>

<h4>Inloggen</h4>

			<form name="form1" method="post" action="php/checklogin.php" class="formulier">

				<label>E-mail</label>
				<input name="myemail" type="text" id="myemail"> <br />

				<label>Wachtwoord</label>
				<input name="mypassword" type="password" id="mypassword"> <br />
&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" name="Submit" value="Login" class="btn btn-confirm">
			</form>
			<br><hr /><br>
			<h4> Registreren</h4>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<label>Nog geen account?</label> <br />
		&nbsp;&nbsp;&nbsp;&nbsp;	
		<a href="register.php"><button class="btn btn-confirm" type="button">Registreren</button></a>
		<br><br>
		</content>
	</article>
					
</div>

<?php	

include ('includes/footer.html');

?>