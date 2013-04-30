<?php 


// Log out
//unset($_SESSION['userid']);
session_start();
unset($_SESSION['ResumeName']);
unset($_SESSION['loggedinstring']);
unset($_SESSION['realname']);
unset($_SESSION['username']);
unset($_SESSION['roles']);
unset($_SESSION['FullName']);
unset($_SESSION['Address']);
unset($_SESSION['Phone']);
unset($_SESSION['Position']);
unset($_SESSION['Start']);
unset($_SESSION['End']);
unset($_SESSION['Job']);

require('contact.php');
?>