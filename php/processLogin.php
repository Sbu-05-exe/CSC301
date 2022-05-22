
<?php

$servername = "cs3-dev.ict.ru.ac.za";
$username = "G20D9300";
$password = "G20D9300";
$dbname = "g20d9300";

// Create connection
include('validation.php');

$conn = new mysqli($servername, $username, $password, $dbname);


if ($_POST["username"] == )
//check if login username is a user name or email

//write SQL to check if the username or email exists exists

//write SQL to check if the password exists

header("Location: ../html/Attractions.html"); // re-direct to attractions if login is successful page

?>