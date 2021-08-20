<?php
    include_once 'connection.php';
    userLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="google" content="notranslate">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home Page</title>
	<link rel = "stylesheet" type = "text/css" href = "styles.css">
</head>
<body>
	<img src="images/logo.jpg" alt="AGCL Logo" width="280" height="80">
	<div class="header">
		<h2>IT Department</h2>
		<h4>Complaint Management System</h4>
	</div>
	<div id = "frm" >
		<h1> Welcome!</h1>
		<a href="displayentriesofdept.php">Check entries of your department</a><br>
		<a href="complaint.php">Have a problem? Let us know!</a><br> 
		<a href="logout.php">Logout</a>
	</div>
</body>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</html>

