<?php
//Joseph Sturzenegger
//U0378425
//PS5
require('application/db.php');
require 'application/authentication.php';
session_start();

redirectToHTTPS();
if((isset($_SESSION['roles']) && !in_array('admin', $_SESSION['roles']))){
	verifyLogin ('client');
}
//check if name is set
if (!isset($_SESSION['ResumeName'])) {
	$_SESSION['ResumeName'] = $_REQUEST['ResumeName'];
}
if (!isset($_SESSION['username'])) {
	$_SESSION['username'] = $_REQUEST['username'];
}

// Without the =&, we would be copying the array
$resumeName =& $_SESSION['ResumeName'];

$sessionTestResumeName = $_SESSION['ResumeName'];
$requestTestResumeName = $_REQUEST['ResumeName'];

$isValidResumeName = false;
// get name if the request is set and it has been changed
if(isset($_REQUEST['ResumeName']))
{
	getResumeName($errorResumeName, $resumeName, $isValidResumeName);
}

// gets the name and adds it to the session if the field is not blank
function getResumeName(&$message, &$caption, &$valid)
{	
	$caption = "";	
	$display = $_REQUEST['ResumeName'];
	$length = strlen($display);
	if($length >= 5 && ctype_alpha($display))
	{
		$caption = $display;
		$_SESSION['ResumeName'] = $display;
		$valid = true;
	}
	else 
	{
		$message = 'A valid resume name consists of only alphabetical characters and is at least 5 characters long.';
		$valid = false;
	}
}
//If the restore button was pressed get the resume from the DB
if(isset($_REQUEST['ButtonGetResume']))
{
	$length = strlen($resumeName);
	if($length >= 5 && ctype_alpha($resumeName))
	{
		restoreSave($resumeName, $DBErrorMessage, $DBSuccessMessage);
	}
}
//If the save button was pressed save the resume to the DB
if(isset($_REQUEST['ButtonSaveResume']))
{
	$length = strlen($resumeName);
	if($length >= 5 && ctype_alpha($resumeName))
	{
		storeSave($resumeName, $DBErrorMessage, $DBSuccessMessage);
	}
}
//If the delete button was pressed delete the resume from the DB
if(isset($_REQUEST['ButtonDeleteResume']))
{
	$length = strlen($resumeName);
	if($length >= 5 && ctype_alpha($resumeName))
	{
		deleteSave($resumeName, $DBErrorMessage, $DBSuccessMessage);
	}
}
$onClickSendValue="";
if(isset($_REQUEST['ButtonViewResume']))
{
	$length = strlen($resumeName);
	if($length >= 5 && ctype_alpha($resumeName))
	{
		restoreSave($resumeName, $DBErrorMessage, $DBSuccessMessage);
		if($DBSuccessMessage == "Sucessfully restored saved resume.")
		{
			$resumeName = $_REQUEST['ResumeName'];
			$onClickSendValue="onclick='getResumeName('$resumeName')'";
		}
	}
}
//If the view button was pressed get the resume from the DB
function restoreSave($resumeName, &$ThisErrorMessage, &$successMessage)
{
	$testUserName = validateUserName($resumeName);
	$tempError = getResumeNameFromDB($resumeName);
	// check for a valid resume name
	if($tempError != $resumeName)
	{
		$ThisErrorMessage = "This name was not found.";
		return;
	}
	//restore all the session variables
	$_SESSION['FullName'] = getFullName($resumeName);
	$_SESSION['Address'] = getAddress($resumeName);
	$_SESSION['Phone'] = getPhone($resumeName);
	$_SESSION['Position'] = getPosition($resumeName);
	if(isset($_SESSION['username']) && $testUserName == $_SESSION['username'] )
	{
		$_SESSION['Start'] = getStartDates($resumeName);
		$_SESSION['End'] = getEndDates($resumeName);
		$_SESSION['Job'] = getDescriptions($resumeName);
		// give successful message
		$successMessage = "Sucessfully restored saved resume.";
	}
	// give error message
	else{
	$ThisErrorMessage = "This name was not found.";
	}
	
}
function deleteSave($resumeName, &$ThisErrorMessage, &$successMessage)
{
	$testUserName = validateUserName($resumeName);
	$tempError = getResumeNameFromDB($resumeName);
	// check for a valid resume name
	if($tempError != $resumeName)
	{
		$ThisErrorMessage = "This name was not found.";
		return;
	}
	if(isset($_SESSION['username']) && $testUserName == $_SESSION['username'] )
	{
		deleteResume($resumeName);
		$successMessage = "Sucessfully deleted saved resume.";
	}
	else {
		$ThisErrorMessage = "This name was not found.";
	}
}
function storeSave($resumeName, &$successMessage, &$successMessage)
{
	//delete all the current resume information
	deleteResume($resumeName);
	$tempResumeName = '';
	$tempFullName = '';
	$tempAddress = '';
	$tempPhone = '';
	$tempPosition = '';
	$tempStart = array();
	$tempEnd = array();
	$tempJob = array();
	//add in all the new information
	if(isset($_SESSION['FullName']))
	{
		$tempFullName = $_SESSION['FullName'];
	}
	if(isset($_SESSION['Address']))
	{
		$tempAddress = $_SESSION['Address'];
	}
	if(isset($_SESSION['Phone']))
	{
		$tempPhone = $_SESSION['Phone'];
	}
	if(isset($_SESSION['Position']))
	{
		$tempPosition = $_SESSION['Position'];
	}
	addResume($resumeName, $tempFullName, $tempAddress, $tempPhone, $tempPosition);
	
	if(isset($_SESSION['Start']))
	{
		$tempStart = $_SESSION['Start'];
	}
	if(isset($_SESSION['End']))
	{
		$tempEnd = $_SESSION['End'];
	}
	if(isset($_SESSION['Job']))
	{
		$tempJob = $_SESSION['Job'];
	}
	for ($i = 0; $i < count($tempJob); $i++) 
	{
		addWorkHistory($resumeName, $tempStart[$i], $tempEnd[$i], $tempJob[$i]);
	}
	$successMessage = "Sucessfully saved current resume.";
}
//just a starting index page for the application
verifyLogin ('client');
//$currentUser = $_SESSION['username'];
require('view/page_archive.php');



?>

