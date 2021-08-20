<?php
    include_once('connection.php');
    $progress = $_POST['progress'];
	$id = $_POST['comp_id'];
    //to prevent from mysqli injection
    $progress = stripcslashes($progress);
    $selectquery = "SELECT * FROM complaintform where id='$id'";
    $result = mysqli_query($conn, $selectquery);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $totalprogress=$progress . "\n". $row['progress'];
    
    $pprogress = mysqli_real_escape_string($conn, $totalprogress);



    $updatequery = "UPDATE complaintform SET progress='$pprogress' where id='$id'";
    $res=mysqli_query($conn,$updatequery);
	 if($res)
	 {
	 	?>
	 		<script>
	 			window.location.replace('displayentries.php');
	 		</script>
	 	<?php
	 } 
?>
