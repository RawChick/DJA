<?php	

	include ('includes/header.html');

	if(isset($_SESSION["user"])){
		session_write_close();
			header("location:myAccount.php");
			exit(0);
	}

?>

<div class= "bottomcontent">

	<article class="mainbar">	
		<header>
			<h2><b>Inloggen</b></h2>
		</header>
			
		<content>
			<form name="form1" method="post" action="php/checklogin.php">

				<label>E-mail </label>
				<input name="myemail" type="text" id="myemail"> <br />

				<label>Wachtwoord</label>
				<input name="mypassword" type="password" id="mypassword"> <br />

				<input type="submit" name="Submit" value="Login" class="btn btn-confirm">
			</form>
			<hr />
			<label>Nog geen account?</label> <br />
			<a href="register.php"><button class="btn btn-confirm" type="button">Registreren</button></a>
		</content>
	</article>
					
</div>

<?php	

include ('includes/footer.html');

?>