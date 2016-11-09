<?php
session_start();
include ('../includes/header2.html');
include ('connection.php');
require ("../lib/password.php");


// email and password sent from form 
$myemail=$_POST['myemail']; 
$mypassword=$_POST['mypassword']; 

$link = mysqli_connect($host, $user, $password, $database);
$query = "SELECT * FROM `users` WHERE `email` ='$myemail'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);


$passquery = $row['password'];
$passpost = $_POST['mypassword'];
echo "
<div class= 'bottomcontent'>
<article class='mainbar'>	
<content>";

   
if($passquery == $passpost || password_verify($passpost, $passquery)) {
 if (password_needs_rehash($passquery, PASSWORD_BCRYPT)){
            $hash = password_hash($passpost, PASSWORD_BCRYPT);
       		$query = "UPDATE users SET password = '".$hash."', Timestamp = CURRENT_TIMESTAMP WHERE email = '".$myemail."'";
			$result = mysqli_query($link, $query);
        }
if($row['actief'] === 'Actief'){

$_SESSION['myemail'] = $myemail;
	$_SESSION['mypassword'] = $mypassword;
	header("location:../account.php");
	exit(0);

}else{
echo "<h3><b>Uw account is nog niet actief</b></h3></br>";
echo "<a href='../index.php'><b>Ga terug naar Home</b></a></br>";

}
}else{
echo "<h3><b>Email en wachtwoord combinatie is niet correct.</b></h3></br>";
echo "<a href='../inloggen.php'><b>Probeer opnieuw</b></a></br>";
}


echo"</content>
</article>
</div>";

include ('../includes/footer2.html');
    /* free result set */
    mysqli_free_result($result);

?>