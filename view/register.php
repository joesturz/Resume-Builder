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
              <li><a href="archive.php">Archive</a></li>
              <li class="active"><a href="register.php">Register</a></li>
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
<p><label for="name">Name</label> 
<input type="text" name="name" value="<?php sticky('name') ?>"size=100/>
<span style="color:red"><?php echo $nameError ?></span></p>

<p><label for="login">Username</label> 
<input type="text" name="newuser" value="<?php sticky('newuser') ?>"size=30/>
<span style="color:red"><?php echo $loginError ?></span></p>

<p><label for="password">Password</label>
<input type="password" name="newpassword" size="30"/>
<span style="color:red"><?php echo $passwordError?></span></p>

<p><label for="password">Confirm Password</label>
<input type="password" name="newpassword2" size="30"/>
<span style="color:red"><?php echo $passwordError2?></span></p>

<p><label for="admin">Administrator?</label>
<input type="checkbox" name="admin" id="admin"/></p>

<p><input type="submit" value="Register" class="btn"/></p>

</form>
<p style="color:red ;"><?php echo $errorResumeName ?></p>
<p style="color:red ;"><?php echo $DBErrorMessage ?></p>
<p style="color:green ;"><?php echo $DBSuccessMessage ?></p>
</div>
</body>
</html>