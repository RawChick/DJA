<?php
include ('../includes/header.html');

// email and password sent from form 
$myemail=$_POST['myemail']; 
$mypassword=$_POST['mypassword']; 

$resultSet = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$myemail' AND `password` = '$mypassword' AND `actief` = 'Actief'");

// Count the returned rows
if($resultSet->num_rows = 1){

	$_SESSION['myemail'] = ("$myemail");
	$_SESSION['mypassword'] = ("$mypassword");
	echo "succes";
	session_write_close();
	header("location:http://localhost/dja/myAccount.php");
	exit(0);

}else {
	echo "Email en Wachtwoord combinatie is niet correct of uw account is nog niet actief.";	
}

    /* free result set */
    mysqli_free_result($resultSet);

?>