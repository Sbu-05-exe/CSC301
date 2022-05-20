<?php
$servername = "http://cs3-dev.ict.ru.ac.za";
$username = $_ENV["PASSWORD"];
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>