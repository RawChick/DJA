<?php
include ('../includes/header.html');
$host="127.0.0.1"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="dja"; // Database name 
$tbl_name="tb_users"; // Table name 

// Connect to server and select databse.
$conn = mysqli_connect("$host", "$username", "$password", $db_name)or die("cannot connect"); 

// data from the post
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email1'];
$function = $_POST['function'];
$password = $_POST['pass1'];

//insert the user into the database
$sql = "
INSERT INTO `dja`.`users` (`email`, `password`, `function`, `firstname`, `lastname`) 
 VALUES ('$email', '$password', '$function', '$firstname', '$lastname');";

if (mysqli_query($conn, $sql)) {
	header("location:http://localhost/dja/inloggen.php");
} else {
    
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>