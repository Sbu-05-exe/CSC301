<?php
// $servername = "Z:\Apache24\htdocs\Practicals\G20D9300\WebTech-Practical\php\info.php";
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
echo "Connected successfully";
//SQL for creating table
$sqlCreateAttractionsTable = "CREATE TABLE Attractions (
                              AttractionId INT(6) NOT NULL UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                              Title VARCHAR(30) DEFAULT 'Title',
                              Descriptions VARCHAR(280) DEFAULT 'Add Description',
                              Likes INT(255),
                              CHECK (Likes >-1)
                              )";

$sqlCreateUsersTable = "CREATE TABLE Users (
                        UserId INT(6) NOT NULL UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        Username VARCHAR(30) NOT NULL UNIQUE,
                        Name VARCHAR(30) NOT NULL,
                        Surname VARCHAR(30) NOT NULL,
                        Email NVARCHAR (255) NOT NULL,
                        Password VARCHAR(50) NOT NULL, /*this isn't right need to come up with a better Type */
                        UserType BIT(1) NOT NULL
                        )";

$sqlCreatereviewTable = "CREATE TABLE Review (
                         ReviewId INT(6) NOT NULL UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                         UserId INT(6) NOT NULL,
                         ReviewDescription VARCHAR(280) DEFAULT 'Add Review',
                         FOREIGN KEY (UserId) REFERENCES Users(UserId)
                         )";

$sqlCreateUserLoginTable = "CREATE TABLE UserLogin (
                           Username VARCHAR(30) NOT NULL UNIQUE,
                           Password VARCHAR(50) NOT NULL, /*this isn't right need to come up with a better Type */
                           FOREIGN KEY (UserName) REFERENCES Users(UserId),
                           FOREIGN KEY (Password) REFERENCES Users(Password)
                           )";
/*Not sure about this last table */
$sqlEmailTable = "CREATE TABLE NewsLetterEmail (
                               EmailId INT(6) NOT NULL UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                               Email NVARCHAR (255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}


?>