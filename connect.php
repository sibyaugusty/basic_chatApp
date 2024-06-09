<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "chat_app";

// Create connection
$conn = new mysqli($serverName, $userName, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>