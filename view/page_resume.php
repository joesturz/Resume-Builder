<!-- Joseph Sturzenegger u0378425 ps3-->
<!DOCTYPE html>
<html>
<head>
<title>Show Resume</title>
<link href="builder.css" rel="stylesheet" type="text/css" />
<link href="bootstrap.css" rel="stylesheet" type="text/css" />
<link href="bootstrap-responsive.css" rel="stylesheet" type="text/css" />
</head>

<body class="RBody">
	<h1 class="RName">
		<?php echo($name) ?>	</h1>

	<p class="RAddress">
		<?php echo($address) ?>	</p>

	<p class="RPhones">
		<?php echo($phone) ?>	</p>

	<hr width="100%">

	<h3>Position Sought</h3>
	<p>
		<?php echo($position) ?>	</p>

	<h3>Employment History</h3>
	<p>
		<?php buildJobs($start, $end, $jobs) ?></p>
</body>

</html>