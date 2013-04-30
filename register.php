<?php 

// Get DB functions
require 'application/db.php';

// Helper functions
require 'application/functions.php';

// Authentication
require 'application/authentication.php';

// Log out
//unset($_SESSION['userid']);
session_start();
if((isset($_SESSION['roles']) && !in_array('admin', $_SESSION['roles']))){
	verifyLogin ('admin');
}


// Use HTTPS
redirectToHTTPS();

if (!isset($_SESSION['username'])) {
	$_SESSION['username'] = $_REQUEST['username'];
}


// If this is a submission, process it
$nameError = '';
$loginError = '';
$passwordError = '';
$passwordError2 = '';

if (isset($_REQUEST['name']) && isset($_REQUEST['newpassword'])&& isset($_REQUEST['newpassword2']) && isset($_REQUEST['newuser'])) {
	
	$name = trim($_REQUEST['name']);
	$login = trim($_REQUEST['newuser']);
	$password = trim($_REQUEST['newpassword']);
	$password2 = trim($_REQUEST['newpassword2']);
	
	$length = strlen($password);
	// Register user if name, login, and password are provided
	if ($name != '' && $password != '' && $password == $password2 && $login != '' && $length > 7) {
		$isAdmin = isset($_REQUEST['admin']);
		if (registerNewUser($name, $login, $password, $isAdmin)) {
			require 'view/registered.php';
			return;
		}
		else {
			$loginError = 'That login name is already in use';
			require 'view/register.php';
			return;
		}
	}
	
	// Complain if name is missing
	if ($name == '') {
		$nameError = 'Enter your name';
	}
	
	// Complain if password is missing
	if ($password == '') {
		$passwordError = 'Pick a password with at least 8 characters';
	}
	if($length < 8){
		$passwordError = 'Pick a password with at least 8 characters';
	}
	
	// Complain if password is missing
	if ($password != $password2) {
		$passwordError2 = 'Confirm password';
	}
	// Complain if login is missing
	if ($login == '') {
		$loginError = 'Pick a login name';
	}
	
	// Redisplay form
	require 'view/register.php';
	
}

else {
	if(!(isset($_SESSION['roles']) && !in_array('admin', $_SESSION['roles']))){
		verifyLogin ('admin');
	}
	require 'view/register.php';
}

?>
