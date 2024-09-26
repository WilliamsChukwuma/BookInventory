<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "book_inventory"; 

// Createing a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
