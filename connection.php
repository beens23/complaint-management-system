<?php
	session_start();
	$username = 'root';
	$password = "";
	$server = 'localhost';
	$db = 'login';
	$conn=mysqli_connect($server,$username,$password,$db);

	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
  	}
	function debug_to_console($data) {
		$output = $data;
		if (is_array($output))
			$output = implode(',', $output);

		echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
	}
	function userLoggedIn()
	{
		if(!$_SESSION['name'])
		{
			header("Location: index.php");
		}
		
	}
	function itDeptCheck()
	{
		if(!$_SESSION['name'] || $_SESSION['department']!='IT')
		{
			header("Location: index.php");
		}
	}
?>