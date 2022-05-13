

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

//Waving starts only after all elements are loaded
window.onload = () => {
	blinking();
	waving();
	moveBanner();
	showSlides();
	
};


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
	slides_interval = setInterval(fade, 100);
	setTimeout(showSlides, 10000);
	
}

function fade() {
	console.log("I'm here");
	if (slide_opacity < 1) {
		slide_opacity = slide_opacity + 0.05;
		document.getElementsByClassName("slide")[slideIndex-1].getElementsByTagName("img")[0].style.opacity = slide_opacity;
	}
	else {
		clearInterval(slides_interval);
	}
}

//Toggle to dark mode

var dark_mode_check = document.getElementsByClassName("toggle_bar")[0].getElementsByTagName("input")[0];
var is_dark = false;
const original_back = document.body.id;
console.log(original_back);
dark_mode_check.addEventListener('click', toggleMode);
const grey_subsection = document.querySelectorAll('.grey_subsection');

function toggleMode() {
	grey_subsection.forEach(e => {
		console.log(e);
		e.classList.toggle('dark_grey_mode');
	});
	if (is_dark) {
		document.body.id = original_back;
		console.log(original_back);
		is_dark = false;
	}
	else {
		document.body.id = 'dark_mode';
		console.log(original_back);
		is_dark = true;
	}
}


//Data validation

const validateEmail = (e) => {
    
    if ( isEmail(e.target.innerText)) {
        // display error message
    }

}

const isEmail = (email) => {
    //string@string.string.[string]

    return email.includes("@") && email.includes(".") 

}

let isUserName = (name) => {
    // username has to begin with letter and then contain numbers or letters
    return /[A-Za-z](\w|_)*/.test(name);

}

const isName = (name) => {
    return name.length > 1
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

