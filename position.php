<?php
//Joseph Sturzenegger
//U0378425
//PS3

// Start/resume a session.  This must be done before any
// output is generated.  Create a resumeSave if necessary.
session_start();
//if there is not session set yet, set one to the request position.
if (!isset($_SESSION['Position'])) {
	$_SESSION['Position'] = $_REQUEST['Position'];
}
// Without the =&, we would be copying the array
$position =& $_SESSION['Position'];
$lengthPosition = strlen($position);
$sessionTestPosition = $_SESSION['Position'];
$requestTestPosition = $_REQUEST['Position'];


$isValidDis = false;
// if position is set and it has been updated getpos()
if(isset($_REQUEST['Position']))
{
	if($sessionTestPosition != $requestTestPosition)
	{
		getPos($errorPos, $position, $isValidDis);
	}
}
// gets the position from the field and adds it to the session if it is not an empty string. if it is empty an error message is displayed
function getPos(&$message, &$caption, &$valid)
{	
	$caption = "";	
	$display = $_REQUEST['Position'];
	$length = strlen($display);
	if($length >= 1)
	{
		$caption = $display;
		$_SESSION['Position'] = $display;
		$valid = true;
	}
	else 
	{
		$message = 'Please describe a position.';
		$valid = false;
	}
}
 
require('view/page_position.php');
?>