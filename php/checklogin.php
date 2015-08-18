<?php
include ('../includes/header.html');

// email and password sent from form 
$myemail=$_POST['myemail']; 
$mypassword=$_POST['mypassword']; 

$sql="SELECT * FROM users WHERE email='$myemail' and password='$mypassword' and actief='Actief'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myemail and $mypassword, table row must be 1 row
if($count==1){

// Register $myemail, $mypassword and redirect to file "login_success.php"
$_SESSION['myemail'] = ("$myemail");
$_SESSION['mypassword'] = ("$mypassword");
session_write_close();
header("location:http://localhost/dja/myAccount.php");
exit(0);
}else {
	echo "Email en Wachtwoord combinatie is niet correct of uw account is nog niet actief.";
}
?>