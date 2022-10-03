<?php
date_default_timezone_set('Asia/Colombo');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>