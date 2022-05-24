
<?php

// Create connection
include('connection.php');
include('validation.php');

$error = "";
$username = $password = $username_error = $fpassword_error = "";
$isSanitized = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//Check that username is entered
	if (empty($_POST["fusername"])) {
		$username_error = "Username is required.";
		$isSanitized = false;
	}
	else {
		$username = $_POST["fusername"];
		//Check if username has correct type
		if (!isUser($username)) {
			$username_error = "Username must be numbers, letters or underscores, and two or more characters long.";
			$isSanitized = false;
		}
		$username = sanitize($username);
	}
    //Check that password is entered
    if (empty($_POST["fpassword"])) {
		$fpassword_error = "Password is required.";
		$isSanitized = false;
	}
	else {
		$password = $_POST["fpassword"];
				
	}
    if ($isSanitized) {
		//Check whether user in database
		$userSelectStmt = $conn->prepare("SELECT UserId FROM users WHERE Username=? AND Password=?");
		$userSelectStmt->bind_param("ss", $username, $password);
		$userSelectStmt->execute();
		$userResult = $userSelectStmt->get_result();
		$result = $userResult->fetch_assoc();
    
		if ($result) {
			// the user exists
			header("Location: ../index.php");
    
		} else {
			// the email or password is incorrect
			$error = "Invalid username or password";
    
		}
		//Close the statement and database connection
		$userSelectStmt->close();
		$conn->close();
	}
	else {
		//Close the database connection
		$conn->close();
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
                </label>
                <div class="error"> * <?php echo $username_error; ?> </div>
				
                <label for="fpassword">

                    <input id="fpassword" type="password" placeholder="Enter password" name="fpassword">
                    <p class="error hide-error"> please enter passowrd</p>
                </label>
				<div class="error"> * <?php echo $fpassword_error; ?> </div>

                <input type="submit" id="login_btn" value="sign in">
                <a id="login_signup" href="Signup.php"> <small>Haven't registered?</small></a>
        </section>
        </form>
    <footer>
    </footer>
	<script src="../js/main.js"></script>
</body>
</html>