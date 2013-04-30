
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
				<p class="navbar-text pull-right"><?php echo $_SESSION['loggedinstring'] ?> <a href="logout.php">logout</a></p>            <ul class="nav">
              <li><a href="archive.php">Login</a></li>
              <li class="active"><a href="contact.php">Contact Info</a></li>
              <li><a href="position.php">Position sought</a></li>
              <li><a href="history.php">Employment history</a></li>
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
	

<form method="post">
<div id="formcenter">
<h3>Contact Information</h3>
<table>
	<tr>
		<td>Full Name </td>
		<td><input type="text" size="50" name="FullName" value="<?php echo($fullName) ?>" />
		<br /></td>
		<td></td>
	</tr>
	<tr>
		<td>Address </td>
		<td><input type="text" size="50" name="Address" value="<?php echo($address) ?>"/><br /></td>
		<td></td>
	</tr>
</table>

		<table id="Phones">
			<tr>
				<td>Phone</td>
				<td><input type="text" size="50" name="Phone" value="<?php echo($phone) ?>"/><br /></td>
		</tr></table><input type="submit" name="btnUpdateContact" value="Update" class="btn"/>
		<p><?php echo $errorName ?></p>
		<p><?php echo $errorAddress ?></p>
		<p><?php echo $errorPhone ?></p>
</div>
</form>
</body>
</html>