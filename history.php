<?php
//Joseph Sturzenegger
//U0378425
//PS3

// Start/resume a session.  This must be done before any
// output is generated.
session_start();
if (!isset($_SESSION['Start'])) {
	$_SESSION['Start'] = $_REQUEST['Start'];	
}
$startArray =& $_SESSION['Start'];	
// Without the =&, we would be copying the array
//$startArray =& $_REQUEST['Start'];

if (!isset($_SESSION['End'])) {
	$_SESSION['End'] = $_REQUEST['End'];
}
// Without the =&, we would be copying the array
$endArray =& $_SESSION['End'];

if (!isset($_SESSION['Job'])) {
	$_SESSION['Job'] = $_REQUEST['Job'];;
}
// Without the =&, we would be copying the array
$jobArray =& $_SESSION['Job'];

$sessionTestStart = $_SESSION['Start'];
$requestTestStart = $_REQUEST['Start'];

$isValidName = false;
// add start dates if text has changed
if(isset($_REQUEST['Start']))
{
	$isSame = true;
	$temparray = array_diff($sessionTestStart, $requestTestStart);
	if(count($temparray) > 0)
	{
		for ($i = 0; $i < count($sessionTestStart); $i++) 
		{
			if($sessionTestStart[$i] != $requestTestStart[$i])
			{
				$isSame = false;
				break;
			}
		}
	}
	else {
		$isSame = false;
	}
	if(!$isSame)
	{
		addStarts();
	}
}
$sessionTestEnd = $_SESSION['End'];
$requestTestEnd = $_REQUEST['End'];

$isValidName = false;
// add end dates if text has changed
if(isset($_REQUEST['End']))
{
	$isSame = true;
	$temparray = array_diff($sessionTestEnd, $requestTestEnd);
	if (count($temparray) > 0) 
	{
		for ($i = 0; $i < count($sessionTestEnd); $i++) 
		{
			if($sessionTestEnd[$i] != $requestTestEnd[$i])
			{
				$isSame = false;
				break;
			}
		}
	}
	else {
		$isSame = false;
	}
	if(!$isSame)
	{
		addEnds();
	}
		
}
$sessionTestJob = $_SESSION['Job'];
$requestTestJob = $_REQUEST['Job'];

$isValidName = false;
// add jobs if text has changed
if(isset($_REQUEST['Job']))
{
	$isSame = true;
	$temparray = array_diff($sessionTestJob, $requestTestJob);
	if(count($temparray) > 0)
	{
		for ($i = 0; $i < count($sessionTestJob); $i++) 
		{
			if($sessionTestJob[$i] != $requestTestJob[$i])
			{
				$isSame = false;
				break;
			}
		}
	}
	else 
	{
		$isSame = false;
	}
	if(!$isSame)
	{
		addJobs();
	}
}
function addStarts()
{
	$_SESSION['Start'] = $_REQUEST['Start'];
	
}
function addEnds()
{
	$_SESSION['End'] = $_REQUEST['End'];
}

function addJobs()
{
	$_SESSION['Job'] = $_REQUEST['Job'];
	
}
$startArray = $_SESSION['Start'];
$endArray = $_SESSION['End'];
$jobArray = $_SESSION['Job'];
//rebuild the fields for the job history
function setStart(&$startArray1,&$endArray1, &$jobArray1)
{
	if(isset($_SESSION['Start']))
	{
		for ($i = 0; $i < count($startArray1); $i++) 
		{
			$tempstart = $startArray1[$i];
			$tempend = $endArray1[$i];
			$tempjob = $jobArray1[$i];
			echo("<tr id='job$i'><td><input type='text' size='10px' name='Start[]' value='$tempstart' /></td><td><input type='text' size='10px' name='End[]' value='$tempend' /></td><td><textarea rows='3' cols='50' name='Job[]'>$tempjob</textarea></td><td><input class='btn' type='button' name='btnRemoveJob' value='Remove Job' onclick='deleteJob(\"job$i\")'/></td></tr>");	
		}
	}
	// otherwise leave a blank field
	else
	{
		echo("<tr id='job0'><td><input type='text' size='10px' name='Start[]' value='' /></td><td><input type='text' size='10px' name='End[]' value='' /></td><td><textarea rows='3' cols='50' name='Job[]'></textarea></td><td><input class='btn' type='button' name='btnRemoveJob' value='Remove Job' onclick='deleteJob(\"job0\")'/></td></tr>");
	}
}


require('view/page_history.php');


?>