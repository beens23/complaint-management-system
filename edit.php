<?php
    include_once('connection.php');
    $progress = $_POST['progress'];
	$id = $_POST['comp_id'];
    //to prevent from mysqli injection
    $progress = stripcslashes($progress);
    $progress = mysqli_real_escape_string($conn, $progress);
    $updatequery = "UPDATE complaintform SET progress='$progress' where id='$id'";
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

