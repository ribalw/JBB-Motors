// As far as I can tell, there's no need to validate input to the sign in page on the client side.
// Yes, the email and password have to be correct but informing the user the password is too weak is no help
// as it must match the password in the database and if the original password was too weak it wouldn't have accepted it so
// if the one they enter to sign in is too weak it doesn't matter as its wrong anyway

// all the same, we still need to pull info from it

function signin() {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    // test print
    console.log("Email: " + email + " Password: " + password);

    // send data to database and confirm if its an account or not
    // if yes, log them in
    // if no, no display error message
}