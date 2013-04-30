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
            <ul class="nav">
              <li class="active"><a href="archive.php">Login</a></li>
              <li><a href="contact.php">Contact Info</a></li>
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
    <div id="formcenter">
<h3>Login</h3>

<p style="color:red"><?php echo $message ?></p>

<form method="post">

<table>
<tr><td><label for="username">Username</label></td>
    <td><input type="text" size="20" name="username" id="username"/></td></tr>
    
<tr><td><label for="password">Password</label></td>
    <td><input type="password" size="20" name="password" id="password"/></td></tr>
    
<tr><td colspan="2"><input type="submit" value="Submit" class="btn"/></td></tr>
</table>

</form><p style="color:red ;"><?php echo $errorResumeName ?></p>
<p style="color:red ;"><?php echo $DBErrorMessage ?></p>
<p style="color:green ;"><?php echo $DBSuccessMessage ?></p>
</form>
</div>
</body>
</html>