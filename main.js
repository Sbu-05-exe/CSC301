

//Global variables for wave animation
var turn = 0, wave_rep = 0;
var waving_interval = null;
var direction = 'right';

//Global variables for rush animation
var move_banner_interval = null;
var banner_pos = 0;


//Global variable for slideshow
let slideIndex = 0;
var slides_interval = null;
var slide_opacity = 0;

//Global variables for dark mode
var is_dark = false;
var dark_mode_check;
var original_back;
var grey_subsection;

//Waving starts only after all elements are loaded
window.onload = () => {
	console.log(document.body.id);
	if (document.body.id == 'body_index') {
		blinking();
		waving();
		checkIndex();
		showSlides();
		checkNav();
		
	}
	if (document.body.id == 'body_restaurant') {
		moveBanner();
	}
	
	if (document.body.id == 'body_login') {
		checkLogin();
		document.getElementById("login_signup").accessKey = "s";
	}
	
	if (document.body.id == 'body-signup') {
		checkSignup();
		setupRadio();
		setupReset();
	}
	
	//Toggle to dark mode
	dark_mode_check = document.getElementsByClassName("toggle_bar")[0].getElementsByTagName("input")[0];
	original_back = document.body.id;
	dark_mode_check.addEventListener('click', toggleMode);
	grey_subsection = document.querySelectorAll('.grey_subsection');



};

//Setting up event listener for signup form
function setupReset() {
	var signup_form = document.getElementById("signup-form");
	signup_form.addEventListener("reset", signupReset);
}

function signupReset() {
	window.alert("You reset the form.");
}

//Setting up event listeners for radio buttons
function setupRadio() {
	console.log("Got into setupRadio");
	var traveller_radio = document.getElementById("fstudent");
	var student_radio = document.getElementById("ftraveller");
	traveller_radio.addEventListener("mouseover", checkRadio);
	student_radio.addEventListener("mouseover", checkRadio);
}

function checkRadio() {
	//If mouse moves over radio button, it will automatically be selected
	console.log("Got into checkRadio");
	this.click();
}


function checkNav() {
	var nav_click = document.getElementById("nav_btn");
	nav_click.addEventListener('click', navInfo);
	
}

function navInfo() {
	//Provides information on the navigator object
	var info = "The app name of the navigator is: " + navigator.appName;
	info = info + "\n" + "The navigator app code name is: " + navigator.appCodeName;
	info = info + "\n" + "The app version is: " + navigator.version;
	info = info + "\n" + "Cookies enabled: " + navigator.cookieEnabled;
	info = info + "\n" + "User agent: " + navigator.userAgent;
	info = info + "\n" + "Language: " + navigator.language;
	info = info + "\n" + "Platform: " + navigator.platform;
	info = info + "\n" + "Plugins: " + navigator.plugins;
	//Use navigator method to tell user if they have Java plugin enabled
	if (navigator.javaEnabled()) {
		info = info + "\n" + "Java Applets are enabled";
	}
	window.alert(info);
}

//Basic validation

function checkLogin() {
	//Checks whether login form has valid information in it
	document.getElementById("login-form").onsubmit = function(e) {
		console.log("In check");
		const username = document.getElementById("fusername").value;
		const login_pass = document.getElementById("fpassword").value;
		//Checks that each input is not empty, sends alert if they are
		if (!username) {
			e.preventDefault();
			alert("Username is required.");
		}
		else if (!login_pass) {
			e.preventDefault();
			alert("Password is required.");
		}
		else {
			//If the username is too short or uses unsupported characters, send alert
			if (!isUserName(username)) {
				e.preventDefault();
				alert("Username must be at least two characters and must not use special characters or numbers.");
			}
		}
	}
}

function checkSignup() {
	//Checks whether signup form has valid information in it
	document.getElementById("signup-form").onsubmit = function(e) {
		console.log("In check");
		const username = document.getElementById("fname").value;
		const email = document.getElementById("femail").value;
		const signup_pass = document.getElementById("fpassword").value;
		const confirm_pass = document.getElementById("f_confirm_password").value;
		//Checks that each input is not empty, sends alert if they are
		if (!username) {
			e.preventDefault();
			alert("Userame is required.");
			document.getElementById("fname").focus();
		}
		else if (!email) {
			e.preventDefault();
			alert("Email is required.");
			document.getElementById("femail").focus();
		}
		else if (!signup_pass) {
			e.preventDefault();
			alert("Password is required.");
			document.getElementById("fpassword").focus();
		}
		else if (!confirm_pass) {
			e.preventDefault();
			alert("Confirm Password is required.");
			document.getElementById("f_confirm_password").focus();
		}
		else {
			//If the username is too short or uses unsupported characters, send alert
			if (!isUserName(username)) {
				e.preventDefault();
				alert("Username must be at least two characters and must not use special characters or numbers.");
				document.getElementById("fname").focus();
			}
			//Send alert if email is invalid
			else if (!isEmail(email)) {
				e.preventDefault();
				alert("Invalid email");
				document.getElementById("femail").focus();
			}
			//Send alert if passwords do not match
			else if (signup_pass != confirm_pass) {
				e.preventDefault();
				alert("Passwords do not match.");
				document.getElementById("fpassword").focus();
			}
			//Send alert if password not sufficiently strong
			else if (!isStrongPassword(signup_pass)) {
				e.preventDefault();
				alert("Password is not strong enough - make sure you use at least three letters, one number and one special character, and is at least 6 characters long.");
				document.getElementById("fpassword").focus();
			}
			else {
			}
		}
	}
}


function checkIndex() {
	document.getElementById("newsletter-form").onsubmit = function(e) {
		const index_email = document.getElementById("email_text").value;
		//Send alert if email is invalid
		if (!isEmail(index_email)) {
			e.preventDefault();
			alert("Invalid email");
		}
	}
}



//Dark mode

function toggleMode() {
	//Turns light subsections grey
	
	grey_subsection.forEach(e => {
		e.classList.toggle('dark_grey_mode');
	});
	//If it was in dark mode, make the background light again (how it originally was)
	if (is_dark) {
		document.body.id = original_back;
		is_dark = false;
		document.getElementById("toggle_status").innerHTML = "You are in light mode."
	}
	//If it was in light mode, make the background dark
	else {
		document.body.id = 'dark_mode';
		is_dark = true;
		document.getElementById("toggle_status").innerHTML = "You are in dark mode."
	}
}


function waving() {
	//Start waving
	waving_interval = setInterval(rotate, 20);
	
};


function rotate() {
	//Picture moves back and forth by 20 degrees
	if (direction == 'right' && turn <= 20) {
		turn++;
	}
	else if (direction == 'right' && turn > 20) {
		direction = 'left';
		turn--;
		wave_rep++;
	}
	else if (direction == 'left' && turn >= -20) {
		turn--;
	}
	else {
		direction = 'right';
		turn++;
	}
	
	document.getElementById("wave").style.transform = 'rotate(' + turn + 'deg)';
	
	//When image has waved 5 times, stop the animation
	if (wave_rep == 5) {
		document.getElementById("wave").style.transform = 'rotate(0deg)';
		clearInterval(waving_interval);
		//Image is deleted
		document.getElementById("wave").remove();
	}
	
}

function blinking() {
	//Start blinking of heading color
	var blinking_interval = setInterval(swapcolor, 1000);
}


function swapcolor() {
	//If it was black, now make it purple
	if (document.getElementById("blinking-text").style.color == 'black') {
		document.getElementById("blinking-text").style.color = 'var(--quinary)';
	}
	//If it's purple or empty, make it black
	else {
		document.getElementById("blinking-text").style.color = 'black';
	}
}

function moveBanner() {
	//Restaurant banner at top of page moves to center
	move_banner_interval = setInterval(rush, 20);
}


function rush() {
	if (banner_pos < 40) {
		banner_pos++;
		document.getElementById("banner").style.left = banner_pos + '%';
	}
	else {
		clearInterval(move_banner_interval);
	}
}

function showSlides() {
	//Shows one image at a time for the slideshow
	var i = 0;
	let slides = document.getElementsByClassName("slide");
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}
	slideIndex++;
	if (slideIndex > slides.length) {
		slideIndex = 1;
	}
	if (slideIndex < 1) {
		slideIndex = slides.length;
	}
	slides[slideIndex-1].style.display = "block";
	setTimeout(showSlides, 10000);
	slides_interval = setInterval(fade, 100);
	
}

function fade() {
	//Causes the image in the slideshow to fade in
	if (slide_opacity < 1) {
		slide_opacity = slide_opacity + 0.05;
		document.getElementsByClassName("slide")[slideIndex-1].getElementsByTagName("img")[0].style.opacity = slide_opacity;
	}
	else {
		slide_opacity = 0;
		clearInterval(slides_interval);
	}
	
}




//Data validation

const isEmail = (email) => {
	//Regex from: https://www.w3resource.com/javascript/form/email-validation.php
    return (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email));

}

const isUserName = (name) => {
    // username has to begin with letter and then contain numbers or letters
	var isUsername = /[A-Za-z](\w|_)*/.test(name);
	console.log(isUsername);
	if (name.length < 2) {
		isUsername = false;
	}
	return isUsername;

}


const isStrongPassword = (pass) => {

    // This method checks if a given string is has at least 1 number 1 special character, 3 letters and must
    // be at least 6 characters long

    if (pass.length < 6) {
        return false;
    }

    let specialChars = "!@#$%^&*()"
    let letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvxyz"
    let numberChar = "0123456789"
    let letterCount = 0, numberCount = 0, specialCharCount = 0;

    for (let i = 0; i < pass.length; i++) {
        if (letters.includes(pass[i])) {
            letterCount++
            continue;
        }

        if (numberChar.includes(pass[i])) {
            numberCount++;
            continue;
        }

        if (specialChars.includes(pass[i])) {
            specialCharCount++;
            continue;
        }


        if (/\w/.test) {

            continue;

        }

        return false;

    }

    return numberCount > 0 && specialCharCount > 0 && letterCount > 2; 
}

