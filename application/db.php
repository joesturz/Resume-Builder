<?php
//Joseph Sturzenegger
//U0378425
//PS5
// Opens and returns a DB connection
require 'hidden/dbpassword.php';

function openDBConnection () {
	$DBH = new PDO("mysql:host=atr.eng.utah.edu;dbname=ps6_sturtzen", 
			       'sturtzen', '00378425');
    $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $DBH;
}
	
//deletes all resume items under a given resumeName
function deleteResume ($resumeName) {
	try {
		$userName = $_SESSION['username'];
		   
        $DBH = openDBConnection();
        $stmt = $DBH->prepare("Delete From Resume Where ResumeName =? and Login =?");
        $stmt->bindValue(1, $resumeName);
        $stmt->bindValue(2, $userName); 
        $stmt->execute();
    }
    catch (PDOException $e) { 
    	$DBH->rollback();
    	reportDBError($e); 
    }  
}

//deletes a user from the DB
function deleteLogin ($login) {
	try {
		$userName = $_SESSION['username'];
		   
        $DBH = openDBConnection();
        $stmt = $DBH->prepare("Delete from ps6_sturtzen.Users where Login =?");
        $stmt->bindValue(1, $login);
        $stmt->execute();
    }
    catch (PDOException $e) { 
    	$DBH->rollback();
    	reportDBError($e); 
    }  
}

// Add a new resume to the db
function addResume ($resumeName, $fullName, $address, $phone, $position) {

	try {
		$userName = $_SESSION['username'];
		// Open handle and start transaction
		$DBH = openDBConnection();
		$DBH->beginTransaction();
		
		// Get userid
		$stmt = $DBH->prepare("Insert into Resume Values (?,?,?,?,?,?);");
		
		$stmt->bindValue(1, $resumeName);
		$stmt->bindValue(2, $userName);
		$stmt->bindValue(3, $fullName);
		$stmt->bindValue(4, $address);
		$stmt->bindValue(5, $phone);
		$stmt->bindValue(6, $position);
		$stmt->execute();

		// Commit the transaction
		$DBH->commit();

	}
	catch (PDOException $e) {
		$DBH->rollback();
		reportDBError($e);
	}
}

// Add a new WorkHistory to the db
function addWorkHistory ($resumeName, $startDate, $endDate, $description) {

	try {

		// Open handle and start transaction
		$DBH = openDBConnection();
		$DBH->beginTransaction();
		
		// Get userid
		$stmt = $DBH->prepare("Insert into WorkHistory Values (?,?,?,?);");
		$stmt->bindValue(1, $resumeName);
		$stmt->bindValue(2, $startDate);
		$stmt->bindValue(3, $endDate);
		$stmt->bindValue(4, $description);
		$stmt->execute();

		// Commit the transaction
		$DBH->commit();

	}
	catch (PDOException $e) {
		$DBH->rollback();
		reportDBError($e);
	}
}

function getResumeNameFromDB ($resumeName) {
	try {
		$DBH = openDBConnection();
		$stmt = $DBH->prepare("select ResumeName from Resume where ResumeName=?");
		$stmt->bindValue(1, $resumeName);
		$stmt->execute();
		if ($row = $stmt->fetch()) {
			return $row['ResumeName'];
		}
		else {
			return "There are no records under this resume name.";
		}
	}
	catch (PDOException $e) {
		reportDBError($e);
	}
}

function getFullName ($resumeName) {
	try {
		$userName = $_SESSION['username'];
		$DBH = openDBConnection();
		$stmt = $DBH->prepare("select FullName from Resume where ResumeName=? and Login =?");
		$stmt->bindValue(1, $resumeName);
		$stmt->bindValue(2, $userName); 
		$stmt->execute();
		if ($row = $stmt->fetch()) {
			return $row['FullName'];
		}
		else {
			return NULL;
		}
	}
	catch (PDOException $e) {
		reportDBError($e);
	}
}
function getAddress ($resumeName) {
	try {
		$userName = $_SESSION['username'];
		$DBH = openDBConnection();
		$stmt = $DBH->prepare("select Address from Resume where ResumeName=? and Login =?");
		$stmt->bindValue(1, $resumeName);
		$stmt->bindValue(2, $userName);
		$stmt->execute();
		if ($row = $stmt->fetch()) {
			return $row['Address'];
		}
		else {
			return NULL;
		}
	}
	catch (PDOException $e) {
		reportDBError($e);
	}
}
function getPhone ($resumeName) {
	try {
		$userName = $_SESSION['username'];
		$DBH = openDBConnection();
		$stmt = $DBH->prepare("select Phone from Resume where ResumeName=? and Login =?");
		$stmt->bindValue(1, $resumeName);
		$stmt->bindValue(2, $userName);
		$stmt->execute();
		if ($row = $stmt->fetch()) {
			return $row['Phone'];
		}
		else {
			return NULL;
		}
	}
	catch (PDOException $e) {
		reportDBError($e);
	}
}
function getPosition ($resumeName) {
	try {
		$userName = $_SESSION['username'];
		$DBH = openDBConnection();
		$stmt = $DBH->prepare("select Position from Resume where ResumeName=? and Login =?");
		$stmt->bindValue(1, $resumeName);
		$stmt->bindValue(2, $userName);
		$stmt->execute();
		if ($row = $stmt->fetch()) {
			return $row['Position'];
		}
		else {
			return NULL;
		}
	}
	catch (PDOException $e) {
		reportDBError($e);
	}
}
function validateUserName ($resumeName) {
	try {
		$userName = $_SESSION['username'];
		$DBH = openDBConnection();
		$stmt = $DBH->prepare("select Login from Resume where ResumeName=? and Login =?");
		$stmt->bindValue(1, $resumeName);
		$stmt->bindValue(2, $userName);
		$stmt->execute();
		if ($row = $stmt->fetch()) {
			return $row['Login'];
		}
		else {
			return NULL;
		}
	}
	catch (PDOException $e) {
		reportDBError($e);
	}
}


// get an array of startdates
function getStartDates($resumeName)
{
	$allDates = Array();
	try
	{
		$DBH = openDBConnection();
		$DBH->beginTransaction();
		$stmt = $DBH->prepare("select StartDate from WorkHistory where ResumeName=?");
		$stmt->bindValue(1, $resumeName);
		$stmt->execute();
		$results = $stmt->fetchAll();
		$dateArray = array();
		foreach ($results as $row)
		{
			 array_push($dateArray, $row['StartDate']);
		}
		return $dateArray;
	}
	catch (PDOException $e) 
	{ 
		$DBH->rollback();
		reportDBError($e);
	} 
}
// get an array of enddates
function getEndDates($resumeName)
{
	$allDates = Array();
	try
	{
		$DBH = openDBConnection();
		$DBH->beginTransaction();
		$stmt = $DBH->prepare("select EndDate from WorkHistory where ResumeName=?");
		$stmt->bindValue(1, $resumeName);
		$stmt->execute();
		$results = $stmt->fetchAll();
		$dateArray = array();
		foreach ($results as $row)
		{
			 array_push($dateArray, $row['EndDate']);
		}
		return $dateArray;
	}
	catch (PDOException $e) 
	{ 
		$DBH->rollback();
		reportDBError($e);
	} 
}
// get an array of descriptions
function getDescriptions($resumeName)
{
	$allDates = Array();
	try
	{
		$DBH = openDBConnection();
		$DBH->beginTransaction();
		$stmt = $DBH->prepare("select Description from WorkHistory where ResumeName=?");
		$stmt->bindValue(1, $resumeName);
		$stmt->execute();
		$results = $stmt->fetchAll();
		$dateArray = array();
		foreach ($results as $row)
		{
			 array_push($dateArray, $row['Description']);
		}
		return $dateArray;
	}
	catch (PDOException $e) 
	{ 
		$DBH->rollback();
		reportDBError($e);
	} 
}

// Logs and reports a database error
function reportDBError ($exception) {
//	$file = fopen("application/log.txt", "a"); 
//	fwrite($file, date(DATE_RSS));
//	fwrite($file, "\n");
//	fwrite($file, $exception->getMessage());
//	fwrite($file, "\n");
//	fwrite($file, "\n");
//	fclose($file);
	require "view/error.php";
	exit();
}
// Registers a new user
function registerNewUser ($name, $login, $password, $isAdmin) {
	try {
		$DBH = openDBConnection();
		$DBH->beginTransaction();

		$stmt = $DBH->prepare("insert into Users (RealName, Login, PW) values(?,?,?)");
		$stmt->bindValue(1, $name);
		$stmt->bindValue(2, $login);
		$hashedPassword = computeHash($password, makeSalt());
		$stmt->bindValue(3, $hashedPassword);
		$stmt->execute();
		$userid = $DBH->lastInsertId();

		$stmt = $DBH->prepare("insert into Roles (Login, Role) values(?,?)");
		$stmt->bindValue(1, $login);
		$stmt->bindValue(2, "client");
		$stmt->execute();

		if ($isAdmin) {
			$stmt = $DBH->prepare("insert into Roles (Login, Role) values(?,?)");
			$stmt->bindValue(1, $login);
			$stmt->bindValue(2, "admin");
			$stmt->execute();
		}
		$DBH->commit();
		return true;
	}
	catch (PDOException $e) {
		if ($e->getCode() == 23000) {
			return false;
		}
		reportDBError($e);
	}
}
?>