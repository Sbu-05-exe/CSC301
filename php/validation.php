<?php
	function isUser($username) {
		//Checks whether the string provided is only composed of characters, letters and underscores, and is more than two characters long
		$isUsername = true;
		if (!preg_match("/^\w+$/", $username) || strlen($username) < 2) {
			$isUsername = false;
		}
		return $isUsername;
	}
	
	function isName($name) {
		//Checks whether the string only has letters in it, and is more than two characters long
		$isAName = true;
		if (!preg_match("/^[A-Za-z]+$/", $name) || strlen($name) < 2) {
			$isAName = false;
		}
		return $isAName;
	}
	
	function isEmail($email) {
		//Checks whether the string is a valid email
		$isAnEmail = true;
		if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)) {
			$isAnEmail = false;
		}
		return $isAnEmail;
	}
	
	function isStrongPassword($password) {
		// This method checks if a given string is has at least 1 number 1 special character, 3 letters and must
		// be at least 6 characters long

		if (strlen($password) < 6) {
			return false;
		}

		$specialChars = "@#$%^&!*()";
		$letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvxyz";
		$numberChar = "0123456789";
		$letterCount = 0; 
		$numberCount = 0;
		$specialCharCount = 0;
		$chars = str_split($password);
		
		//Count each type of character in password
		foreach ($chars as $char) {
			if (str_contains($letters, $char)) {
				$letterCount++;
				continue;
			}

			if (str_contains($numberChar, $char)) {
				$numberCount++;
				continue;
			}

			if (str_contains($specialChars, $char)) {
				$specialCharCount++;
				continue;
			}


			if (preg_match("/\w/", $char)) {

				continue;

			}

			return false;

		}

		return ($numberCount > 0 && $specialCharCount > 0 && $letterCount > 2); 
	}
	
	function sanitize($value) {
		// Removes whitespaces, slashes and converts html characters for a particular string
		$value = trim($value);
		$value = stripslashes($value);
		$value = htmlspecialchars($value);
		return $value;
	}
	
?>