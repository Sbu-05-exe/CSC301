
<?php
//Start the session
session_start();

// Create connection
include('connection.php');
include('validation.php');
include('logs.php');

//Setting up log file for all errors
$log_file = "./errors.log";
ini_set("log_errors", TRUE);
ini_set("error_log", $log_file);

$msg = "";
$error = "";
$username = $password = $username_error = $fpassword_error = "";
$isSanitized = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//Check that the person has not been blocked, based on whether they entered an incorrect password or username 5 times or more in the last hour
	if (!mustBlock()) {
		//Check that username is entered
		if (empty($_POST["fusername"])) {
			$username_error = "Username is required.";
			$msg = '"Username field is empty"';
			$isSanitized = false;
		}
		else {
			$username = $_POST["fusername"];
			//Check if username has correct type
			if (!isUser($username)) {
				$username_error = "Username must be numbers, letters or underscores, and two or more characters long.";
				$msg = '"Username syntax is invalid"';
				$isSanitized = false;
			}
			$username = sanitize($username);
		}
		//Check that password is entered
		if (empty($_POST["fpassword"])) {
			$fpassword_error = "Password is required.";
			$msg = '"Password field is empty"';
			$isSanitized = false;
		}
		else {
			$password = $_POST["fpassword"];
				
		}
		if ($isSanitized) {
			$nameSelectStmt = $conn->prepare("SELECT UserId FROM users WHERE Username=?");
			$nameSelectStmt->bind_param("s", $username);
			$nameSelectStmt->execute();
			$nameResult = $nameSelectStmt->get_result();
			$nameRes = $nameResult->fetch_assoc();
			if ($nameRes) {
				$isValidUsername = true;
			}
			else {
				$isValidUsername = false;
				$error = "Invalid username or password";
				$msg = '"Invalid user ' . $username . '"';
			
				$conn->close();
			}
			$nameSelectStmt->close();
			if ($isValidUsername) {
				//Check whether user in database

				$userSelectStmt = $conn->prepare("SELECT UserId, ImgRef, PasswordHash FROM users WHERE Username=?");
				$userSelectStmt->bind_param("s", $username);
				$userSelectStmt->execute();
				$userResult = $userSelectStmt->get_result();
				$result = $userResult->fetch_assoc();

				 $database_hash = $result["PasswordHash"];
				$password_hash = hash('sha256', $password);

				if ($result && trim($database_hash) == trim($password_hash)) {
					// the user exists
					// create a session so the user is logged in on all pages
					$_SESSION['ID'] = $result['UserId'];
					$_SESSION['loggedin'] = true;
					$_SESSION['img'] = $result['ImgRef'];
					$_SESSION['addr'] = $_SERVER['REMOTE_ADDR'];
					
					header("Location: ../index.php");
					
				} else {
					// the email or password is incorrect
					$error = "Invalid username or password";
					$msg = '"Invalid password for user ' . $username . '"';
    
				}
				//Close the statement and database connection
				$userSelectStmt->close();
				$conn->close();
			}
		}
		else {
			//Close the database connection
			$conn->close();
		}
		if ($msg != "") {
			//If the login was not successful, log it
			$msg = $msg. ' "from" ' . $_SERVER["REMOTE_ADDR"];
			error_log($msg);
		}
	}
	//Tell them they cannot log in for the next hour
	else {
		$error = "You have been locked out. Please wait an hour before trying again.";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visiting Makhanda - Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body id="body_login"> 
        <section class="form-section">
            
            <form method="post" action="" id="login-form">
                <h1> Login </h1>
                <p class="backend-error">
                    <?php
                    if ($error) {
                        echo $error;
                        $error = "";
                    }; 
                    ?>
                </p>
                <label for="fusername">
                    <input id="fusername" placeholder="Enter username" type="text" name="fusername">
                    <p class="error hide-error"> please enter username </p>
					<div class="error"> * <?php echo $username_error; ?> </div>
                </label>
				
                <label for="fpassword">

                    <input id="fpassword" type="password" placeholder="Enter password" name="fpassword">
                    <p class="error hide-error"> please enter passowrd</p>
					<div class="error"> * <?php echo $fpassword_error; ?> </div>
                </label>

                <input type="submit" id="login_btn" value="sign in">
                <a id="login_signup" href="Signup.php"> <small>Haven't registered?</small></a>
        </section>
        </form>
    <footer>
    </footer>
	<script src="../js/main.js"></script>
</body>
</html>