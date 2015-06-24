<?php # Script 15.9 - login_ajax.php
// This script is called via Ajax from login.php.
// The script expects to receive two values in the URL: an email address and a password.
// The script returns a string indicating the results.

// Need two pieces of information:
function validate_email_and_passwrd($email, $password) {

	// Need a valid email address:
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		
		// Must match specific values:
		if ( ($email == 'email@example.com') && ($password == 'testpass') ) {
	
			// Set a cookie, if you want, or start a session.

			// Indicate success:
			return 'CORRECT';
			
		} else { // Mismatch!
			return 'INCORRECT';
		}
		
	} else { // Invalid email address!
		return 'INVALID_EMAIL';
	}

}

if (isset($_GET['email'], $_GET['password'])) {

	echo validate_email_and_passwrd($_GET['email'], $_GET['password']);

} else if (isset($_POST['email'], $_POST['password'])) {

	$result = validate_email_and_passwrd($_POST['email'], $_POST['password']);

	if ($result == 'CORRECT') {
		session_start();
		echo "you are logged in";
	} else {
		include ('login.html');
	}

} else { // Missing one of the two variables!
	echo 'INCOMPLETE';
}

?>