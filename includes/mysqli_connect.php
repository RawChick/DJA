<?php # Script 17.x - mysqli_connect.php

// This file contains the database access information. 
// This file also establishes a connection to MySQL 
// and selects the database.
$host ="localhost";
$user ="root";
$pass ="";
$database = "dja";

// variables.php
$conn = mysqli_connect($host, $user, $pass, $database);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

global $conn;

$conn->set_charset('utf8');

?>
