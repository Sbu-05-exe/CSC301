<?php

    $servername = "cs3-dev.ict.ru.ac.za";
    $username = "G20D9300";
    $password = "G20D9300";
    $dbname = "g20d9300";

    $conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

?>