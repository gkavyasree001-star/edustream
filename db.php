<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "edustream";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if connection works
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Database Connected Successfully!";
?>