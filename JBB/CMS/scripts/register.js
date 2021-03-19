function register() {
    let newFirstName = document.getElementById('firstname').value;
    let newLastName = document.getElementById('lastname').value;
    let newEmail = document.getElementById('email').value;
    let newPassword = document.getElementById('password').value;
    let newAddress = document.getElementById('address').value;
    let newNumber = document.getElementById('telephone').value;

    let myRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

    let strongPassword = false;
    let phoneCorrectFormat = false;

    if (myRegex.test(newPassword)) {
        strongPassword = true;
    } else {
        alert("Password is too weak");
    }

    if (newNumber.length == 11 && !isNaN(newNumber)) {
        phoneCorrectFormat = true;
    } else {
        alert("Please check your phone number");
    }

    if (strongPassword && phoneCorrectFormat) {
        let newAccount = {
            firstname: newFirstName,
            lastname: newLastName,
            email: newEmail,
            password: newPassword,
            address: newAddress,
            number: newNumber
        };
        console.log(newAccount);
        // this can be changed to code to add it to the database once it's made
    } else {
        alert("Failed to register account");
    }
}