<?php
	session_start();
	//Make the connection
	include('connection.php');
	
	//Get to the right file path
	$basename = basename($_FILES["imgref"]["name"]);
	$canUpload = true;
	$fileExtension = strtolower(pathinfo($basename,PATHINFO_EXTENSION));
	$targetPath = '../Images/thumbnails/' . hash('sha256', $_SESSION["ID"]) . "." . $fileExtension;
	
	//Need checks like making sure that .jpg or .png, is right size etc.
	
	//Move the image to the correct file
	if (move_uploaded_file($_FILES["imgref"]["tmp_name"], $targetPath)) {
		//Change the thumbnail reference for this user in the database
		$thumbnailStmt = $conn->prepare('UPDATE users SET ImgRef=? WHERE UserId=?');
		$thumbnailStmt->bind_param('si', $basename, $_SESSION['ID']);
		$thumbnailStmt->execute();
		//Change the image for the session to reflect this new image
		$_SESSION['img'] = $basename;
		
		//Close statement and connection
		$thumbnailStmt->close();
		$conn->close();
		
		header("Location: profile.php");
	}
	else {
		//Close statement and connection
		$conn->close();
		header("Location: profile.php");
	}

?>