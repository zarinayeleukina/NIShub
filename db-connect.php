<?php
$servername = "localhost";
$username = "elz";
$password = "Zarina123hey";
$dbname = "elz_project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Set character set for Cyrilli
mysqli_set_charset($conn, "utf8");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>