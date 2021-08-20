<?php
    include_once 'connection.php';
    userLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Complaint form</title>
  <link rel = "stylesheet" type = "text/css" href = "styles.css">

</head>
<body>
<img src="images/logo.jpg" alt="AGCL Logo" width="280" height="80">
<div class="header">
  <h2>IT Department</h2>
  <h4>Complaint Management System</h4>
</div>
<div id = "frm">
        <h1>Complaint Form:</h1>
        <form action="" method="POST" action="">
			<p>
				<label> Name: <br></label>
				<input value="<?php echo $_SESSION['name']; ?>" type="text" name="name" required disabled>
			</p>
			<p>
				<label> Department: <br></label>
				<input value="<?php echo $_SESSION['department']; ?>" type="text" name="department" required disabled>
			</p>
			<p>
				<label> Complaint Location: <br></label>
				<input type="text" name="location" required>
			</p>
			<p>
				<label> Assets no.: <br></label>
				<input type="text" name="assettno" required>
			</p>
			<p>
				<label> State the issue here: <br></label>
				<textarea name="description" rows="10" cols="30" required></textarea>
			</p>
			<input type="submit" name="submit" id = "btn" value = "Submit">
        </form>
		<?php 
			if($_SESSION['department']=='IT') 
			{
				?> 
        		<a href="itdept.php">Home</a>
				<?php
			}
			else
			{
				?>
        		<a href="home.php">Home</a>
				<?php
			}	
		?>
    
</div>


</body>
</html>

<?php 
if(isset($_POST['submit'])){
    $name=$_SESSION['name'];
    $department=$_SESSION['department'];
    $location=$_POST['location'];
    $assettno=$_POST['assettno'];
    $description=$_POST['description'];

    $insertquery = "INSERT INTO complaintform(name,department,location,assettno,description) VALUES('$name','$department','$location','$assettno','$description') ";

    $res=mysqli_query($conn,$insertquery);
   
    if($res){
      if($_SESSION['department']=='IT')
      {
        ?>
        <script>
          window.location.replace("ITDEPT.php");
        </script>
        <?php   
      }else
      {
        ?>
        <script>
          window.location.replace("home.php");
        </script>
        <?php   

      }

    }else{
      ?>
      <script>
        alert("Not inserted into Table");
      </script>
      <?php
    }
}

?>
