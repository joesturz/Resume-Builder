<?php
//Joseph Sturzenegger
//U0378425
//PS3

// Start/resume a session.  This must be done before any
// output is generated.  Create a resumeSave if necessary.
session_start();
//check if name is set
if (!isset($_SESSION['FullName'])) {
	$_SESSION['FullName'] = $_REQUEST['FullName'];
}
// Without the =&, we would be copying the array
$fullName =& $_SESSION['FullName'];
//check if address is set
if (!isset($_SESSION['Address'])) {
	$_SESSION['Address'] = $_REQUEST['Address'];
}
// Without the =&, we would be copying the array
$address =& $_SESSION['Address'];
//check if phone is set
if (!isset($_SESSION['Phone'])) {
	$_SESSION['Phone'] = $_REQUEST['Phone'];
}
// Without the =&, we would be copying the array
$phone =& $_SESSION['Phone'];

$sessionTestName = $_SESSION['FullName'];
$requestTestName = $_REQUEST['FullName'];

$isValidName = false;
// get name if the request is set and it has been changed
if(isset($_REQUEST['FullName']))
{
	if($sessionTestName != $requestTestName)
	{
		getName($errorName, $fullName, $isValidName);
	}
}

$sessionTestAddress = $_SESSION['Address'];
$requestTestAddress = $_REQUEST['Address'];

$isValidAddress = false;
// get name if the Address is set and it has been changed
if(isset($_REQUEST['Address']))
{
	if($sessionTestAddress != $requestTestAddress)
	{
		getAddress($errorAddress, $address, $isValidAddress);
	}
}

$sessionTestPhone = $_SESSION['Phone'];
$requestTestPhone = $_REQUEST['Phone'];

$isValidPhone = false;
// get name if the Address is set and it has been changed
if(isset($_REQUEST['Phone']))
{
	if($sessionTestPhone != $requestTestPhone)
	{
		getPhone($errorPhone, $phone, $isValidPhone);
	}
}
// gets the name and adds it to the session if the field is not blank
function getName(&$message, &$caption, &$valid)
{	
	$caption = "";	
	$display = $_REQUEST['FullName'];
	$length = strlen($display);
	if($length >= 1)
	{
		$caption = $display;
		$_SESSION['FullName'] = $display;
		$valid = true;
	}
	else 
	{
		$message = 'Please enter a name.';
		$valid = false;
	}
}
// gets the address and adds it to the session if the field is not blank
function getAddress(&$message, &$caption, &$valid)
{	
	$caption = "";	
	$display = $_REQUEST['Address'];
	$length = strlen($display);
	if($length >= 1)
	{
		$caption = $display;
		$_SESSION['Address'] = $display;
		$valid = true;
	}
	else 
	{
		$message = 'Please enter a address.';
		$valid = false;
	}
}
// gets the phone and adds it to the session if the field is not blank 
function getPhone(&$message, &$caption, &$valid)
{	
	$caption = "";	
	$display = $_REQUEST['Phone'];
	$length = strlen($display);
	if($length >= 1)
	{
		$caption = $display;
		$_SESSION['Phone'] = $display;
		$valid = true;
	}
	else 
	{
		$message = 'Please enter a phone number.';
		$valid = false;
	}
} 
// added the page 
require('view/page_contact.php');
?>