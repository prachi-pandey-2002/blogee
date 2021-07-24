<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blogee";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn == false) {
  die("Connection failed: " . $conn->connect_error);
}

?>
