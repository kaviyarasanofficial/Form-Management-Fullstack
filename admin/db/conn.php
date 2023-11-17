<?php


$servername = "localhost";
$username = "rectubmx_customer";
$password = "Rakesh@2023";
$dbname = "rectubmx_customerquery";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>