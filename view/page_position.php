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
              <li class="active"><a href="position.php">Position sought</a></li>
              <li><a href="history.php">Employment history</a></li>
              <li><a href="archive.php">Archive</a></li>
              <li><a href="register.php">Register</a></li>
              <li><a href="resume.php" target="_blank">View resume</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <br />
    <br />
    <div id="formcenter">
<h3>Position Sought</h3>

<form method="post">
<textarea name="Position" rows="2" cols="50">
<?php echo($position) ?>
</textarea><br /><br />
<div></div>
<input type="submit" name="btnUpdatePosition" value="Update" class="btn"/>
<p><?php echo($errorPos) ?></p>
</form>
</div>
</body>
</html>