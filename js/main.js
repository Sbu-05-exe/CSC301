
let places = [
	{	
		name: "The Rat and Parrot" ,
		type:  {
			title: "restuarant",
			subtype: "fast casual"
		},
		thumbnail: "TheRatAndParrot1.png",
		rating: 4.2,
		reviews: 4,

		description: " A great place to eat out with friends and celebrate finishing big tests or assignments. Awesome food, and great atmosphere.",
		extra: `<table border="1px">
							<tr>
								<td>Address:</td>
								<td>59A New St Grahamstown 6139</td>
							</tr>
							<tr>
								<td>Phone:</td>
								<td>046 622 5002</td>
							</tr>
							<tr>
								<td rowspan="3">Hours:</td>
								<td>Mon-Wed & Sat: 11:00-00:00</td>
							</tr>
							<tr>
								<td>Thurs-Fri: 11:00-02:00</td>
							</tr>
							<tr>
								<td>Sun: 11:00-22:00</td>
							</tr>
							<tr>
								<td colspan="2"><a href="https://www.facebook.com/ratandparrotgtown/">Facebook</a></td>
							</tr>
						</table>`
	},

	{
		name: "Gino's",
		type: { 
			title: "restuarant",
			subtype: "fine dining",
		},
		rating: 3.9,
		reviews: 143,


		thumbnail: "Gino's.jpg",
		description: ` If you want to impress that special person by breaking the bank. This is the place to go. `,
		extra: `<table border="1px">
							<tr>
								<td>Address:</td>
								<td>8 New St Grahamstown 6139</td>
							</tr>
							<tr>
								<td>Phone:</td>
								<td>046 622 7208</td>
							</tr>
							<tr>
								<td>Hours:</td>
								<td>Mon-Sun: 11:00-22:00</td>
							</tr>
							<tr>
								<td colspan="2"><a href="https://www.facebook.com/Ginosgrahamstown/">Facebook</a></td>
							</tr>
						</table>` 
	},

	{
		name: "Fork and Dagger",
		type: {
			title: "restuarant",
			subtype: "fine dining"
		},
		thumbnail:"ForkAndDagger.jpg",
		description: "If you want to impress that special person by breaking the bank. This is the place to go. ",
		extra: 
		`<table border="1px">
							<tr>
								<td>Address:</td>
								<td>38 Somerset Street, Opposite the Arch Grahamstown 6139</td>
							</tr>
							<tr>
								<td>Phone:</td>
								<td>046 004 0006</td>
							</tr>
							<tr>
								<td rowspan="2">Hours:</td>
								<td>Mon-Sat: 11:00-22:00</td>
							</tr>
							<tr>
								<td>Sun: 11:00-16:00</td>
							</tr>
							<tr>
								<td colspan="2"><a href="https://www.facebook.com/majorfrasers/">Facebook</a></td>
							</tr>
						</table>		`

	},
	{
		name: "The Red cafe",
		type: {
			title: "restuarant",
			subtype: "cafe"
		},
		rating: 4.2,
		reviews: 43,


		thumbnail: "RedCafe1.jpg",
		description: "A great place to grab a quick lunch between lectures and tutorials or practicals.",
		extra: `<table border="1px">
							<tr>
								<td>Address:</td>
								<td>127 High Street Grahamstown 6139</td>
							</tr>
							<tr>
								<td>Phone:</td>
								<td>046 622 8384</td>
							</tr>
							<tr>
								<td rowspan="4">Hours:</td>
								<td>Mon-Tue: 08:30-17:00</td>
							</tr>
							<tr>
								<td>Wed-Fri: 08:30-21:00</td>
							</tr>
							<tr>
								<td>Sat: 09:00-21:00</td>
							</tr>
							<tr>
								<td>Sun: 12:00-14:00</td>
							</tr>
							<tr>
								<td colspan="2"><a href="https://www.facebook.com/redcafemakhanda/">Facebook</a></td>
							</tr>
						</table>`
	},
	{
		name: "Major Fraser's",
		type: {
			title: "restuarant",
			subtype: "cafe"
		},

		rating: 4.8,

		thumbnail: "MajorFrasers.jpg",
		description: " A chilled place to hang with friends and grab a coffee. A popular place to eat among families. A nice place to have a farewell meal that marks your leaving the nest.",
		extra: `<table border="1px">
							<tr>
								<td>Address:</td>
								<td>38 Somerset Street, Opposite the Arch Grahamstown 6139</td>
							</tr>
							<tr>
								<td>Phone:</td>
								<td>046 004 0006</td>
							</tr>
							<tr>
								<td rowspan="2">Hours:</td>
								<td>Mon-Sat: 11:00-22:00</td>
							</tr>
							<tr>
								<td>Sun: 11:00-16:00</td>
							</tr>
							<tr>
								<td colspan="2"><a href="https://www.facebook.com/majorfrasers/">Facebook</a></td>
							</tr>
						</table>			`

	}, {

		name: "National Arts Festival",
		type: {
			title: "attraction",
			subtype: "entertainment"
		},
		rating: 5.0,
		thumbnail:"NAF.png",
		description: "The national arts festival is an annual ceremony that... "
	}, {
		name: "Museum",
		type: {
			title: "attraction",
			subtype: "heritage"
		},
		rating: 4.0,
		reviews: 12,


		thumbnail: "museum.jpg",
		description: "This Museum is held in 7 different buildings. It is the second oldest Museum in South Africa. You can have a coffee in an old prison cell if you're into that sort of thing. "
	}, {
		name: "Botanical Gardens",
		type: {
			title: "attraction",
			subtype: "wildlife/nature"
		}, 
		rating: 4.7,

		thumbnail: "Bots1.jpg",
		description: "The Botanical Gardens, also known as bots, is embodiment of Grahamstowns fauna and flora. These tranquil gardens make for fun picnics and engaging walks. Every Saturday there is also a parkrun for those who enjoy exercising outdoors."
	}, {
		name: "The Cathedral",
		type: {
			title: "attraction",
			subtype: "heritage"
		},
		rating: 3.7,
		reviews: 403,


		thumbnail: "cathedral.png",
		description: " One of Makhanda great architecture. It is the cathedral of Saint Michael and Saint George. Founded by John Armstrong. It is also the tallest building in the area and has the tallest spire in South Africa.  "
	}, {
		name: "1820s Settlers Monument",
		type: {
			title: "attraction",
			subtype: "heritage"
		},
		rating: 3.9,
		reviews: 5,


		thumbnail: "monument.jpg", 
		description: "A building that represents the ships that the 1820s settlers came on. Every Rhodes student's journey begins and ends at the Monument with the exception of covid students."
	}



	// {
	// 	name: 
	// }

]
// TODO: add a like count for each
//Global variables for wave animation
let turn = 0, waveRep = 0;
let waving_interval = null;
let direction = 'right';

//Global variables for rush animation
let move_banner_interval = null;
let banner_pos = 0;


//Global variable for slideshow
let slideIndex = 0;
var slides_interval = null;
var slide_opacity = 0;

//Global variables for dark mode
let is_dark = false;
let dark_mode_check;
let original_back;
let grey_subsection;


// declaring all elements that need to be interacted with
const searchResults = document.querySelector(".search-results");
const body = document.getElementsByTagName("body")[0];

// const root = document.querySelectory(':root');

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
		/*checkLogin();
		document.getElementById("login_signup").accessKey = "s";	
		const usernameInput = document.getElementById("fusername");
		const passwordInput = document.getElementById("fpassword");

		const handleSignUpform = (e, num) => {
			if (!e.target.value) {
				const errorMessage = document.createElement('p');
				const usernameLabel = document.getElementsByTagName('label')[num];
				errorMessage.className="error";
				errorMessage.style.position = "absolute";
				errorMessage.style.transform = "translate(10px,45px)"
				usernameLabel.append(errorMessage);
				errorMessage.innerText= num ? "please provide username" : "please provide password";

				setTimeout(() => {
					usernameLabel.removeChild(errorMessage);
				},1000)
			}	
		}

		// usernameInput.addEventListener('focus', onSignUpInputFocus)
		usernameInput.addEventListener('focusout', (e) => handleSignUpform(e,0) );
		passwordInput.addEventListener('focusout', (e) => handleSignUpform(e,1));

		// usernameInput.addEventListener('focusout', (e) => console.log("focusing out of username"));
		// passwordInput.addEventListener('focusout', (e) => console.log("focusing out of password"));
		*/
		
	}
	
	if (document.body.id == 'body-signup') {
		//checkSignup();
		setupRadio();
		setupReset();

	}

	if (document.body.id == "body-attractions") {

		let timeid = 0;

		const searchInput = document.getElementById("search-input");
		const attractionTypeDropdown = document.getElementById("Attraction-Type-Dropdown");
		const sortbyTypeDropdown = document.getElementById("Sort-By-Dropdown");

		const resetPlaces = [...places]; 
		const getAttractionResults = (attractions) => {
			// This function uses an html template that a place object uses to display infromation and 
			// then inserts it into the attractions page.
		
			// I'm a ware that putting html in javascript is not a good idea but this is the
			// easiest way to do it

			if (attractions.length != 0) {
				// console.log(resetPlaces);
				places = attractions;
			} else {
				places = [];
				if (searchInput.value.length ==0) {
					places = resetPlaces;
					attractions = resetPlaces;
				}
				// console.log(resetPlaces);
			}
		
			const placesHTML = attractions.map( place => {
		
				return `<div class="gutter attraction-container">
							<div class="attraction">
								<div class="attraction-thumbnail-container">
								<figure class="attraction-thumbnail">
									<img src="../Images/Attractions/${place.thumbnail}" alt="picture of ${place.name}">
								<figure/>
								</div>	
								<section class="attraction-description">
									<h3>${place.name}</h3>
									<p>${place.description} </p>
		
								</section>
							</div>
							
						</div>`
			})



			clearTimeout(timeid);

			searchResults.innerHTML = `<div class="gutter attraction-container">
			 <div class="loader"> </div> </div>`

			timeid = setTimeout(() => {

				if (searchResults.length == 0) {
					searchResults.innerHTML = `<div class="gutter attraction-container" >No Results Found</div>` 
				} else {
					searchResults.innerHTML = placesHTML.join(" ");
				}
			}, Math.random() * 1000 )

			// searchResults.innerHTML = searchResults.length == 0 ?  : placesHTML.join(" ")
			// searchResults.innerHTML = placesHTML.join(" ")
		
		}

		const sortByAttractionType = (value) => {
			if (value == 0) {
				return resetPlaces;

			} else {

				const options = ["",  "reviews","rating"];
				const key = options[value];
				console.log("sorting by " + key );
				return places.sort((place1, place2) => place1[key] - place2[key]);
			}
		}

		const filterByAttractionType = (value) => {

			if (value == 0) {
				return resetPlaces;
			} else {

				const options = ["", "restuarant", "attraction"];
				const key = options[value];

				console.log("filtering by " + key)
				return places.filter(place => place.type.title.toUpperCase() == key.toUpperCase())
			}
		}
		
		const filterByAttractionName = (substring) => {
			return places.filter(place => place.name.toUpperCase().includes(substring.toUpperCase()));
		} // onFilterByName
		
		getAttractionResults(places);
		searchInput.addEventListener("input", (e) => getAttractionResults(filterByAttractionName(e.target.value)));
		sortbyTypeDropdown.addEventListener("change", (e) => getAttractionResults(sortByAttractionType(e.target.value)))
		attractionTypeDropdown.addEventListener("change", (e) => getAttractionResults(filterByAttractionType(e.target.value)));
	}
	
	//Toggle to dark mode

	// something is throwing an error here
	dark_mode_check = document.getElementsByClassName("toggle_bar")[0].getElementsByTagName("input")[0];
	original_back = document.body.id;
	dark_mode_check.addEventListener('click', toggleDarkMode);
	grey_subsection = document.querySelectorAll('.grey_subsection');



};

//Setting up event listener for signup form
function setupReset() {
	var signup_form = document.getElementById("signup-form");
	signup_form.addEventListener("reset", signupReset);
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

/*
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
*/

/*

function checkSignup() {
	//Checks whether signup form has valid information in it
	document.getElementById("signup-form").onsubmit = function(e) {
		e.preventDefault();
		console.log("In check");
		const username = document.getElementById("fname").value;
		const email = document.getElementById("femail").value;
		const signupPass = document.getElementById("fpassword").value;
		const confirmPass = document.getElementById("fconfirm").value;


		//Checks that each input is not empty, sends alert if they are
		if (!username.value) {
			alert("Userame is required.");
			// username.classList.add('invalid-input');
			username.classList.add("invalid-input")
			username.focus();
		}
		else if (!email.value) {
			e.preventDefault();
			alert("Email is required.");
			email.classList.add('invalid-input')
			email.focus();
		}
		else if (!signupPass.value) {
			alert("Password is required.");
			signupPass.focus();
			signupPass.classList.add('invalid-input')
		}
		else if (!confirmPass.value) {
			alert("Confirm Password is required.");
			confirmPass.focus();
			confirmPass.classList.add('invalid-input')
		}
		else {
			//If the username is too short or uses unsupported characters, send alert
			if (!isUserName(username)) {
				alert("Username must be at least two characters and must not use special characters or numbers.");
				username.focus();
				username.classList.add('invalid-input')
			}
			//Send alert if email is invalid
			else if (!isEmail(email)) {
				alert("Invalid email");
				email.focus();
				email.classList.add('invalid-input')
			}
			//Send alert if passwords do not match
			else if (signupPass != confirm_pass) {
				alert("Passwords do not match.");
				password.focus();
				password.classList.add('invalid-input')
			}
			//Send alert if password not sufficiently strong
			else if (!isStrongPassword(signupPass)) {
				alert("Password is not strong enough - make sure you use at least three letters, one number and one special character, and is at least 6 characters long.");
				password.classList.add('invalid-input')
				confirmPass.focus();
			}
		}
	}
}
*/


function checkIndex() {
	document.getElementById("newsletter-form").onsubmit = function(e) {
		e.preventDefault();
		const index_email = document.getElementById("email_text").value;
		//Send alert if email is invalid
		if (!isEmail(index_email)) {
			alert("Invalid email");
		}
	}
}



//Dark mode

function toggleDarkMode() {
	//Turns light subsections grey
	
	grey_subsection.forEach(e => {
		e.classList.toggle('dark_grey_mode');
	});

	//If it was in dark mode, make the background light again (how it originally was)
	if (is_dark) {
		document.body.id = original_back;
		is_dark = false;
		body.classList.remove('darkmode');
		document.getElementById("#submit-color").style.backgroundColor = "var(--tertiary)";
		document.getElementById("#toggle-icon").className = "sun large icon";
	}
	//If it was in light mode, make the background dark
	else {
		document.body.id = 'dark_mode';
		is_dark = true;
		body.classList.add('darkmode');
		document.getElementById("#submit-color").style.backgroundColor = "var(--primary)";
		document.getElementById("#toggle-icon").className = "moon large icon";
		document.getElementById("#main-padding").style.paddingTop = "10rem";
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
		waveRep++;
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
	if (waveRep == 5) {
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
		document.getElementById("blinking-text").style.color = 'var(--tertiary)';
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
	slides_interval = setInterval(fade, 20);
	
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





// TODO: contemplate whether to add places.extra
// TODO: onload get attractions results
// TODO: add icons to each image

