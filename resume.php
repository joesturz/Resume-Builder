<?php
//Joseph Sturzenegger
//U0378425
//PS3
require('application/db.php');
// Start/resume a session.  This must be done before any
// output is generated.  Create a resumeSave if necessary.
session_start();
// returns a page of data from the database if provided with a valid ResumeName
if (isset($_REQUEST['name']) && isset($_REQUEST['login']))
{
	$resumeName = $_REQUEST['name'];
	$_SESSION['username'] = $_REQUEST['login'];
	
	$_SESSION['ResumeName'] = $resumeName;
	$_SESSION['FullName'] = getFullName($resumeName);
	$_SESSION['Address'] = getAddress($resumeName);
	$_SESSION['Phone'] = getPhone($resumeName);
	$_SESSION['Position'] = getPosition($resumeName);
	
	$_SESSION['Start'] = getStartDates($resumeName);
	$_SESSION['End'] = getEndDates($resumeName);
	$_SESSION['Job'] = getDescriptions($resumeName);
	
}
// get the gathered data from each page and displays it if there is a value or returns an error if there is no data.
if (isset($_SESSION['FullName'])) 
{
	if($_SESSION['FullName'] != "")
	{
		$name = $_SESSION['FullName'];
	}
	else 
	{
		$name = "Error: No Name Set";
	}
}
else 
{
	$name = "Error: No Name Set";
}

if (isset($_SESSION['Address'])) 
{
	if($_SESSION['Address'] != "")
	{
		$address = $_SESSION['Address'];
	}
	else 
	{
		$address = "Error: No Address Set";
	}
}
else 
{
	$address = "Error: No Address Set";
}

if (isset($_SESSION['Phone'])) 
{
	if($_SESSION['Phone'] != "")
	{
		$phone = $_SESSION['Phone'];
	}
	else 
	{
		$phone[0] = "Error: No Phone Set";
	}
}
else 
{
	$phone = "Error: No Phone Set";
}

if (isset($_SESSION['Position'])) 
{
	if($_SESSION['Position'] != "")
	{
		$position = $_SESSION['Position'];
	}
	else 
	{
		$position = "Error: No Position Set";
	}
}
else 
{
	$position = "Error: No Position Set";
}

if (isset($_SESSION['Job'])) 
{
	if($_SESSION['Job'] != "")
	{
		$jobs = $_SESSION['Job'];
	}
	else 
	{
		$jobs[0] = "Error: No Jobs Set";
	}
}
else 
{
	$jobs[0] = "Error: No Jobs Set";
}

if (isset($_SESSION['Start'])) 
{
	if($_SESSION['Start'] != "")
	{
		$start = $_SESSION['Start'];
	}
	else 
	{
		$start[0] = "Error: No Start Date Set";
	}
}
else 
{
	$start[0] = "Error: No Start Date Set";
}

if (isset($_SESSION['End'])) 
{
	if($_SESSION['End'] != "")
	{
		$end = $_SESSION['End'];
	}
	else 
	{
		$end[0] = "Error: No End Date Set";
	}
}
else 
{
	$end[0] = "Error: No End Date Set";
}
function buildJobs($start, $end, $jobs)
{
	for ($i = 0; $i < count($start); $i++) 
	{
		echo "<p>$start[$i] $end[$i] $jobs[$i]</p>";	
	}
}

require('view/page_resume.php');


?>