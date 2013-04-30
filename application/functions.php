<?php 

// Echoes a parameter value if it exists
function sticky ($name) {
	if (isset($_REQUEST[$name])) {
		echo $_REQUEST[$name];
	}
}

 ?>
