<?php
function changeSessionID () {
	$server = $_SERVER['SERVER_NAME'];
	$secure = usingHTTPS();
	session_set_cookie_params(0, "/", $server, $secure, true);
	session_regenerate_id(true);
}

// Reports if https is in use
function usingHTTPS () {
	return isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] != "off");
}

// Redirects to HTTPS
function redirectToHTTPS()
{
	if(!usingHTTPS())
	{
		$redirect = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location:$redirect");
		exit();
	}
}
// This function will return only if the current user is logged in, using the specified
// role (if $role is nonempty).

function verifyLogin ($role) {
	
	// Perhaps the user is already logged in
	if (isset($_SESSION['realname'])) {
		
		// Does the user belong to the appropriate role?
		if ($role == '' || (isset($_SESSION['roles']) && in_array($role, $_SESSION['roles']))) {
			
			return $_SESSION['realname'];            // Logged in, right role
		}
		else {
			require 'view/page_badRole.php';       // Logged in, wrong role
			exit();
		}
		
	}
	
	// Empty error message
	$message = "";

	// User is attempting to log in.  Verify credentials.
		if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
			try {
				$DBH = openDBConnection();
				
				// Get the information about the user.  This includes the
				// hashed password, which will be prefixed with the salt.
				$stmt = $DBH->prepare("select Login, RealName, PW from Users where Login = ?");
				$stmt->bindValue(1, $username);
				$stmt->execute();
				
				// Was this a real user?
				if ($row = $stmt->fetch()) {
					
					// Validate the password
					$hashedPassword = $row['PW'];
					if (computeHash($password, $hashedPassword) == $hashedPassword) {
						$_SESSION['realname'] = 
							htmlspecialchars($row['RealName']);
						$_SESSION['username'] = $username;
						$stmt->closeCursor();
						$stmt = $DBH->prepare("select Role from Roles where Login = ?");
						$stmt->bindValue(1, $username);
						$stmt->execute();
						$roles = array();
						while ($row = $stmt->fetch()) {
							$roles[] = $row['Role'];
						}
						$_SESSION['loggedinstring'] = 'Logged in as: ' . $_SESSION['realname'];
						$_SESSION['roles'] = $roles;
					}
					else {
						$message = "Username or password was wrong";
						require "application/login.php";
						exit();
					}
				}
				else {
					$message = "Username or password was wrong";
					require "application/login.php";
					exit();
				}
			}
			catch (PDOException $exception) {
				require "view/error.php";
				exit();
			}
			
			// We're logged in, so change session ID.  If the session ID was
			// stolen before we switched to HTTPS, it will do no good now.
			changeSessionID();
			if ($role == '' || in_array($role, $_SESSION['roles'])) {
				return;                                  // Right role
			}
			else {
				require 'view/page_badRole.php';       // Wrong role
				exit();
			}
		}
		else {
			require 'application/login.php';
			exit();
		}
	
	}
// Generates random salt for blowfish
function makeSalt () {
	$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
	return '$2a$12$' . $salt;
}

// Compute a hash using blowfish using the salt. 
function computeHash ($password, $salt) {
	return crypt($password, $salt);
}
?>