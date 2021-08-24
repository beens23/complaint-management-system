<?php   
    include_once 'connection.php';
    itDeptCheck();
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
        <a href="displayentries.php">Check Entries</a><br>
        <a href="complaint.php">Have A Problem? Let Us Know!</a><br>
        <a href="closedentries.php">Closed Complaints</a><br>
        <a href="usertable.php">All Users</a><br>
        <a href="closedentriesall.php">All Closed Complaints</a><br>
        <a href="displayentriesall.php">All Pending Entries</a><br>
        <a href="logout.php">Logout</a>
        </form>
</div>

</body>
</html>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
