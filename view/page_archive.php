<!-- Joseph Sturzenegger u0378425 ps3-->
<!DOCTYPE html>
<html>
<head>
<title>Resume Builder</title>
<!--<link href="builder.css" rel="stylesheet" type="text/css" />-->
<link href="bootstrap.css" rel="stylesheet" type="text/css" />
<link href="bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
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
              <li><a href="history.php">Employment history</a></li>
              <li class="active"><a href="archive.php">Archive</a></li>
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
<h3>Archive</h3>

<form  method="get">
<table>
	<tr><p>To manage a previously created resume, enter the saved resume name:</p></tr>
	<tr><input id="ArchiveResumeName" type="text" name="ResumeName" value="<?php echo($resumeName) ?>" /></tr>
	<tr>
		<td><input type="submit" name="ButtonSaveResume" value="Save" class="btn"/></td>
		<td><input type="submit" name="ButtonGetResume" value="Restore" class="btn" /></td>
		<td><input type="submit" name="ButtonDeleteResume" value="Delete" class="btn"/></td>
		<td><input type="submit" name="ButtonViewResume" value="View" class="btn" onclick="getResumeName('<?php echo $resumeName ?>')" /></td>
	</tr>
</table>
<p style="color:red ;"><?php echo $errorResumeName ?></p>
<p style="color:red ;"><?php echo $DBErrorMessage ?></p>
<p style="color:green ;"><?php echo $DBSuccessMessage ?></p>
</form>
</div>
</body>
</html>