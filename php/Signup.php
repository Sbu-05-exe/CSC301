<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visiting Makhanda</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body id="body-signup">
		<?php
		include('validation.php');
		//Opens the connection to the database
		include('connection.php');
		
		$fname = $firstname = $surname = $email = $fpassword = $cpassword = $radio = "";
		$fname_error = $firstname_error = $surname_error = $email_error = $fpassword_error = $cpassword_error = "";
		$isSanitized = true;
		$canInsert = true;
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			//Check whether each required field is empty or not
			if (empty($_POST["fname"])) {
				$fname_error = "Username is required.";
				$isSanitized = false;
			}
			else {
				$fname = $_POST["fname"];
				//Check if username has correct type
				if (!isUser($fname)) {
					$fname_error = "Username must be numbers, letters or underscores, and two or more characters long.";
					$isSanitized = false;
				}
				$fname = sanitize($fname);
			}
			if (empty($_POST["firstname"])) {
				$firstname_error = "Firstname is required.";
				$isSanitized = false;
			}
			else {
				$firstname = $_POST["firstname"];
				//Check if firstname has correct type
				if (!isName($firstname)) {
					$firstname_error = "First name can only be letters and two or more characters long.";
					$isSanitized = false;
				}
				$firstname = sanitize($firstname);
			}
			if (empty($_POST["surname"])) {
				$surname_error = "Surname is required.";
				$isSanitized = false;
			}
			else {
				$surname = $_POST["surname"];
				//Check if surname has correct type
				if (!isName($surname)) {
					$surname_error = "Surname can only be letters and two or more characters long.";
					$isSanitized = false;
				}
				$surname = sanitize($surname);
			}
			if (empty($_POST["email"])) {
				$email_error = "Email is required.";
				$isSanitized = false;
			}
			else {
				$email = $_POST["email"];
				//Check if email has correct type
				if (!isEmail($email)) {
					$email_error = "Invalid email.";
					$isSanitized = false;
				}
				$email = sanitize($email);
			}
			if (empty($_POST["fpassword"])) {
				$fpassword_error = "Password is required.";
				$isSanitized = false;
			}
			else {
				$fpassword = $_POST["fpassword"];
				//Checks if password is strong
				if (!isStrongPassword($fpassword)) {
					$fpassword_error = "Password must be at least 6 characters long, and contain 3 letters, a number and a special character.";
					$isSanitized = false;
				}
			}
			if (empty($_POST["cpassword"])) {
				$cpassword_error = "Confirm Password is required.";
				$isSanitized = false;
			}
			else {
				$cpassword = $_POST["cpassword"];
				//Checks if the passwords match
				if ($fpassword != $cpassword) {
					$cpassword_error = "Passwords must match.";
					$isSanitized = false;
				}
			}
			$radio = $_POST["usertype"];
			if ($isSanitized) {
				$usernameStmt = $conn->prepare("SELECT UserId FROM users WHERE Username=?");
				$usernameStmt->bind_param("s", $fname);
				$usernameStmt->execute();
				$usernameResult = $usernameStmt->get_result();
				$userData = $usernameResult->fetch_assoc();
				if ($userData) {
					$fname_error = "Username already exists.";
					$canInsert = false;
				}
				$usernameStmt->close();
				
				$emailStmt = $conn->prepare("SELECT UserId FROM users WHERE Email=?");
				$emailStmt->bind_param("s", $email);
				$emailStmt->execute();
				$emailResult = $emailStmt->get_result();
				$emailData = $emailResult->fetch_assoc();
				if ($emailData) {
					$email_error = "Email already used.";
					$canInsert = false;
				}
				$emailStmt->close();
				
				if ($canInsert) {
					//Prepare statement in advance with parameters, to prevent SQL injection
					$userInsertStmt = $conn->prepare("INSERT INTO users (Username, FirstName, LastName, Email, PasswordHash) VALUES (?, ?, ?, ?, ?)");
					$userInsertStmt->bind_param("sssss", $fname, $firstname, $surname, $email, $fpassword);
					//Insert user into database
					$userInsertStmt->execute();
				
					//Close the statement and database connection
					$userInsertStmt->close();
					$conn->close();
					
					//Go to login page since signup successful
					header("Location: Login.php");
				}
				//Close the database connection
				$conn->close();
			}
			else {
				//Close the database connection
				$conn->close();
			}
		}
		?>
        <section class="form-section" >
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="signup-form">
            <h1>Signup</h1>
            <a href="Login.html"><small>already have an account? </small></a>
    
                <input size="20" maxlength="50" type="text" id="fname" name="fname" autofocus  value="<?php if(isSet($_POST["fname"])) echo $_POST["fname"] ?>" placeholder="Username" />
				<div class="error"> * <?php echo $fname_error; ?> </div>

                <input type="text" id="fnames" name="firstname" value="<?php if(isSet($_POST["firstname"])) echo $_POST["firstname"] ?>" placeholder="Name"/> <!--added this for the sql table-->
				<div class="error"> * <?php echo $firstname_error; ?> </div>

                <input type="text" id="fsurname" name="surname" value="<?php if(isSet($_POST["surname"])) echo $_POST["surname"] ?>" placeholder="Surname"/> <!--added this for the sql table-->
				<div class="error"> * <?php echo $surname_error; ?> </div>
                
                <input type="text" id="femail" name="email" value="<?php if(isSet($_POST["email"])) echo $_POST["email"] ?>" placeholder="Email"/>
				<div class="error"> * <?php echo $email_error; ?> </div>
     
        
                <input type="password" id="fpassword" name="fpassword" placeholder="Password"/>
				<div class="error"> * <?php echo $fpassword_error; ?> </div>
 
                <input type="password" id="fconfirm" name="cpassword" placeholder="Confirm Password"/>
				<div class="error"> * <?php echo $cpassword_error; ?> </div>

                <section class="radio-group">
                
                <label class="radio-label" for="ftraveller" > 
                <input 
                value="Traveller" 
                id="ftraveller" 
                type="radio" 
                name="usertype"
                />Traveller</label>

                <label class="radio-label" for="fstudent">
                    <input 
                        value="Student" 
                        id="fstudent" 
                        type="radio" 
                        name="usertype"
    					checked />
                    Student
                </label>
			
                </section>
                <input id="signup-button" type="submit" value="Sign Up">

                </input>
				<button type="reset">
                    Reset form
                </button>

        </form>
        </section>
		<script src="../js/main.js"></script>
</body>
</html>