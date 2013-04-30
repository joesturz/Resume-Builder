<!-- Joseph Sturzenegger u0378425 ps3-->
<!DOCTYPE html>
<html>
<head>
<title>Resume Builder</title>
<!--<link href="builder.css" rel="stylesheet" type="text/css" />-->
<link href="bootstrap.css" rel="stylesheet" type="text/css" />
<link href="bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="rb.js"></script>
</head>

	
<body class="FBody">
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php">Resume Builder</a>
          <div class="nav-collapse collapse">
          	<p class="navbar-text pull-right"><?php echo $_SESSION['loggedinstring'] ?> <a href="logout.php">logout</a></p>
            <ul class="nav">
              <li><a href="archive.php">Login</a></li>
              <li><a href="contact.php">Contact Info</a></li>
              <li><a href="position.php">Position sought</a></li>
              <li class="active"><a href="history.php">Employment history</a></li>
              <li><a href="archive.php">Archive</a></li>
              <li><a href="register.php">Register</a></li>
              <li><a href="resume.php" target="_blank">View resume</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	<br />
	<br />
	<div id="formcenter">
<h3>Employment History</h3>

<form method="post">

	<table id="History">
		<tr id="Header">
			<td>Start Date</td>
			<td>End Date</td>
			<td>Position Description</td>
			<td></td>
		</tr>
		<?php setStart($startArray,$endArray, $jobArray) ?>		
	</table>
	
<input type="button" name="btnAddJob" value="Add Job" onclick="addJob()" class="btn" />
<input type="submit" name="btnUpdateHistory" value="Update" class="btn" />
</form>
</div>
</body>
</html>