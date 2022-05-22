
<?php

// Create connection
include('connection.php');
include('validation.php');

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["fusername"];
    $password = $_POST["fpassword"];
    
    $sql = "SELECT * FROM users 
            WHERE username = '$username'  AND passwordHash = '$password'";
    
    
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1 ) {
        // the user exists
        header("Location: index.php");
    
    } else {
        // the email or password is inccorrect
        $error = "Invalid username or password";
    
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
                
                <label for="fpassword">

                    <input id="fpassword" type="password" placeholder="Enter password" name="fpassword">
                    <p class="error hide-error"> please enter passowrd</p>
                </label>

                <input type="submit" id="login_btn" value="sign in">
                <a id="login_signup" href="Signup.html"> <small>Haven't registered?</small></a>
        </section>
        </form>
    <footer>
    </footer>
	<script src="../js/main.js"></script>
</body>
</html>