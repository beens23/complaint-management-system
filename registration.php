<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration Page</title>
	<link rel = "stylesheet" type = "text/css" href = "styles.css">
	<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
<link href="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	

	<!-- <script language="javascript">

		function admSelectCheck(nameSelect)
		{
			if(nameSelect){
				admOptionValue = document.getElementById("admOption").value;
				if(admOptionValue != 0){
					document.getElementById("admDivCheck").style.display = "";
				}
				else{
					document.getElementById("admDivCheck").style.display = "none";
				}
			}
			else{
				document.getElementById("admDivCheck").style.display = "none";
			}
		}

	</script> -->
	
</head>
<body>
	<img src="images/logo.jpg" alt="AGCL Logo" width="280" height="80">
	<div class="header">
		<h2>IT Department</h2>
		<h4>Complaint Management System</h4>
	</div>
	<div id = "frm" >
		<h1>Create Account:</h1>
		<form action="" onsubmit= "return matchPassword()" method="POST" >
    <p><label> Email: <br> </label><input type="email" name="email" required></p>
			<p><label> Username: <br> </label><input type="text" name="name" required></p>


			<p>
        <label> Department: <br></label>
		<input list="browsers" name="department" id="browser">
		<datalist id="browsers">
		<!-- <select id="department" name="department" required>-->
			<option value="IT">IT Department</option>
			<option value="O & M">O & M Department</option>
			<option value="GMB">GMB Department</option>
			<option value="Pipeline">Pipeline Department</option>
			<option value="Instrumentation">Instrumentation Department</option>
			<option value="HSE">HSE Department</option>
			<option value="HRA">HRA Department</option>
			<option value="F&A">F&A Department</option>
			<option value="Materials">Materials Department</option>
			<option value="P&U">P&U Department</option>
			<option value="Transport">Transport Department</option>
			<option value="Security">Security Department</option>
			<option value="SCADA">SCADA Department</option>
			<option value="Civil">Civil Department</option>
			<option value="Land">Land Department</option>
			<option value="Medical"> Medical Department</option>
        <!--</select> --></datalist>

		<!-- <div id="admDivCheck" style="display:none;">
			admin selected
		</div> -->
		<!-- <div id="others" style="display: none;">
			<input type="text" id="department" name="department"><br>
		</div> -->
		<!-- <input type="text" name="department" id="department" required> -->
		
      </p>


			<p><label> Password: <br></label><input type="password" name="password" id="password" required></p>
			<p><label> Confirm Password: <br></label><input type="password" name="confirmpassword" id="confirmpassword" required></p>
			<input type="submit" name="submit" id = "btn" value = "Sign-in">
		</form>
		<a href="index.php">Already have an account? Sign in!</a>
	</div>
	<script>  
		function matchPassword() {  
			var pw1 = document.getElementById("password").value;  
			var pw2 = document.getElementById("confirmpassword").value;  
			if(pw1 != pw2)  
			{   
				alert("Passwords did not match"); 
				return false; 
			} else {    
				return true;
			}  
		}  
	</script>  
</body>
</html>
<?php 
	include_once 'connection.php';
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
    	$name=$_POST['name'];
		$department=$_POST['department'];
		$password=$_POST['password'];

		//to prevent from mysqli injection
    	$email = stripcslashes($email);
		$name = stripcslashes($name);
		$password = stripcslashes($password);
		$department = stripcslashes($department);
		$username = mysqli_real_escape_string($conn, $username);
		$password = mysqli_real_escape_string($conn, $password);
		$department = mysqli_real_escape_string($conn, $department);
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		$insertquery = "INSERT INTO users(id,username,password,department) VALUES('$email','$name','$hashed_password','$department') ";
		$res=mysqli_query($conn,$insertquery);
		if($res){
		?>
			<script>
				window.location.replace("index.php");
			</script>
		<?php 
			}else{
		?>
			<script>
				alert("Registration incomplete");
			</script>
		<?php
	}
}
?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
