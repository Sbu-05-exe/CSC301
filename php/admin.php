<?php

$servername = "cs3-dev.ict.ru.ac.za";
$username = "G20D9300";
$password = "G20D9300";
$dbname = "g20d9300";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br/>";

// $sqlTestingCreateTableQuery = "CREATE TABLE temp (
  //                     tempID INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY 
  //                     )";
  
  //SQL for creating tables
$sqlCreateAttractionsTable = "CREATE TABLE Attractions (
                              AttractionID INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                              Title VARCHAR(30),
                              Descriptions VARCHAR(280),
                              Type VARCHAR(20), 
                              SubType VARCHAR(20),
                              thumbnail VARCHAR(50)
                              )";

                              // The group column would be either restuarant or attraction

$sqlCreateUsersTable = "CREATE TABLE Users (
                        UserID INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        Username VARCHAR(30) NOT NULL UNIQUE,
                        FirstName VARCHAR(30) NOT NULL,
                        LastName VARCHAR(30) NOT NULL,
                        Email VARCHAR (255) NOT NULL,
                        Password VARCHAR(50) NOT NULL 
                        )";
                        // PasswordHash BINARY(50) NOT NULL (this is the goal but for now i'm not really worried about security practicies)

   /*this isn't right need to come up with a better Type */ 

$sqlCreateReviewTable = "CREATE TABLE Reviews (
                         ReviewID INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                         UserID INT(6) NOT NULL,
                         AttractionID INT(6) NOT NULL,
                         ReviewDescription VARCHAR(300) 
                         )";

                            // FOREIGN KEY (UserID) REFERENCES Users(UserID),

// there is no need for the commented tables
//===================================
// $sqlCreateUserLoginTable = "CREATE TABLE UserLogin (
//                            Username VARCHAR(30) NOT NULL UNIQUE,
//                            Password VARCHAR(50) NOT NULL, /*this isn't right need to come up with a better Type */
//                            FOREIGN KEY (UserName) REFERENCES Users(UserId),
//                            FOREIGN KEY (Password) REFERENCES Users(Password)
//                            )";


/*Not sure about this last table */
// $sqlEmailTable = "CREATE TABLE NewsLetterEmail (
//                                EmailId INT(6) NOT NULL UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//                                Email NVARCHAR (255) NOT NULL
// )";


function createTable($sql, $tablename) {

  global $conn;
  if ($conn->query($sql) === TRUE) {
    echo "successfully created table " . $tablename;
  } else {
    echo "failed to create " . $tablename . "\n" . $conn->error; 
  }

  echo "<br/>";

}

function dropTable($tablename) {

  global $conn;
  $sql = "DROP TABLE " . $tablename;

  if ($conn->query($sql) === TRUE) {
    echo "successfully removed table " . $tablename;
  } else {
    echo "failed to drop " . $tablename . "<br/>". $conn->query; 
  }

  echo "<br/>";
}

// createTable($sqlCreateAttractionsTable, "Attractions");
// createTable($sqlCreateUsersTable, "Users");
// createTable($sqlCreateReviewTable, "Reviews");


// PLEASE DO NOT UNCOMMENT THE FOLLOWING CODE WITHOUT GIVING ME OR SOMEONE A HEADSUP!

// dropTable("Attractions");
// dropTable("Users");
// dropTable("Reviews");

function importJSONdata() {
  $json = file_get_contents("../js/attraction.json");
  
  $json_data = json_decode($json, true);
  
  global $conn;
  // print_r($json_data);
  foreach ($json_data as $item) {
    $name =  $item["name"];
    $info = $item["type"]; 
    $type = $info["title"];
    $subtype = $info["subtype"];
    $thumbnail = $item["thumbnail"];
    // this is information you would query from users
    // $reviews =  $item["reviews"];
    // $rating = $item["rating"];
    $description = $item["description"];
  
    $userInsertStmt = $conn->prepare("INSERT INTO attractions (title, thumbnail, type, subtype, descriptions) VALUES (?, ?, ?, ?, ?)");
    $userInsertStmt->bind_param("sssss", $name, $thumbnail, $type, $subtype, $description);
    $userInsertStmt->execute();
  
    // echo "inserted " . $name;
    // echo "<br/>";
  }
  
  // print_r($json_data);
}

// importJSONdata();

// import function works




$conn->close();

?>