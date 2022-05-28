<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visiting Makhanda - Profile Page</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body id="body-profile">

	
    <?php
		include('validation.php');
		//Opens the connection to the database
		include('connection.php');
		
		//Load original values into input boxes
		if(!isset($_SESSION['ID'])) {
			die('Your session id could not be found. Please log in again.');
		}
		else {
			$sql = 'SELECT * FROM users WHERE UserId=' . $_SESSION['ID'];
			$result = $conn->query($sql);
			if ($result->num_rows != 1) {
				die('Id is not in database. Please contact admin.');
			}
			else {
				$data = $result->fetch_assoc();
			}
		}
		
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
				//Allowed for own username to stay the same, but cannot be the same as some other users
				$usernameStmt = $conn->prepare("SELECT UserId FROM users WHERE Username=? AND UserId!=?");
				$usernameStmt->bind_param("si", $fname, $_SESSION['ID']);
				$usernameStmt->execute();
				$usernameResult = $usernameStmt->get_result();
				$userData = $usernameResult->fetch_assoc();
				if ($userData) {
					$fname_error = "Username already exists.";
					$canInsert = false;
				}
				$usernameStmt->close();
				
				//Allowed for own email address to stay the same, but cannot be the same as some other users
				$emailStmt = $conn->prepare("SELECT UserId FROM users WHERE Email=? AND UserId!=?");
				$emailStmt->bind_param("si", $email, $_SESSION['ID']);
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
					$userInsertStmt = $conn->prepare("UPDATE users SET Username=?, Name=?, Surname=?, Email=?, Password=?, UserType=? WHERE UserId=?");
					$userInsertStmt->bind_param("sssssbi", $fname, $firstname, $surname, $email, $fpassword, $radio, $_SESSION['ID']);
					//Insert user into database
					$userInsertStmt->execute();
				
					//Close the statement and database connection
					$userInsertStmt->close();
					$conn->close();
					
					//Go to login page since signup successful
					header("Location: ../index.php");
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

	<main>
	<section class="form-section" >
		<div class="flex-row">
			<form id="image-form" action="upload_img.php" method="post" enctype="multipart/form-data">
				<img id="user_thumbnail" style="height:100px;" src="<?php if (isset($_SESSION['img'])) {echo '../Images/thumbnails/' . $_SESSION['img'];} ?>" >
				<input type="file" name="imgref" id="imgref" accept=".png, .jpg, .jpeg">
				<input type="submit" name="upload_img" value="Edit image">
			</form>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="profile-form">
				<h1>Profile</h1>
				<a href="../index.php"><small>Home</small></a>
				
					

					<label for="">
						<input size="20" maxlength="50" type="text" id="fname" name="fname" autofocus  value="<?php if(isSet($_POST["fname"])) {echo $_POST["fname"];} else {echo $data['Username'];} ?>" placeholder="Username" />
						<div class="error"> * <?php echo $fname_error; ?> </div>
					</label>

					<label for="">
						<input type="text" id="fnames" name="firstname" value="<?php if(isSet($_POST["firstname"])) {echo $_POST["firstname"];} else {echo $data['Name'];} ?>" placeholder="Name"/> <!--added this for the sql table-->
						<div class="error"> * <?php echo $firstname_error; ?> </div>
					</label>

					<label for="">
						<input type="text" id="fsurname" name="surname" value="<?php if(isSet($_POST["surname"])) {echo $_POST["surname"];} else {echo $data['Surname'];}?>" placeholder="Surname"/> <!--added this for the sql table-->
						<div class="error"> * <?php echo $surname_error; ?> </div>
					</label>

					<label for="">
						<input type="text" id="femail" name="email" value="<?php if(isSet($_POST["email"])) {echo $_POST["email"];} else {echo $data['Email'];}?>" placeholder="Email"/>
						<div class="error"> * <?php echo $email_error; ?> </div>
					</label>
						
					<label for="">
						<input type="password" id="fpassword" name="fpassword" placeholder="Password"/>
						<div class="error"> * <?php echo $fpassword_error; ?> </div>
					</label>
			
					<label for="">
						<input type="password" id="fconfirm" name="cpassword" placeholder="Confirm Password"/>
						<div class="error"> * <?php echo $cpassword_error; ?> </div>
					</label>

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
						<input id="edit-button" type="submit" value="Edit">
					</input>

			</form>

			<form id="log-out-form" action="<?php echo htmlspecialchars("processLogout.php");?>" method="POST">
				<input id="log-out" type="submit" value="log out"></input>
			</form>
			</div>
	</section>
	</main>
	<script src="../js/main.js"></script>
</body>
</html>