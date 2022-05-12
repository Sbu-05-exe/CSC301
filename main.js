alert("hello world");

const element = document.getElementById();

element.addEventListener("focus", )

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

