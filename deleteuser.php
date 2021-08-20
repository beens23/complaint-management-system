<?php
include_once('connection.php');

$delete_id=$_GET['del']; 

$selectquery = "SELECT * FROM users where id='$delete_id'";
$result = mysqli_query($conn, $selectquery);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);


$delete_query="delete  from users WHERE id='$delete_id'";//delete query  
$runn=mysqli_query($conn,$delete_query);  
if($runn)  
{  
    //javascript function to open in the same window   
       echo "<script>window.open('usertable.php?deleted=user has been deleted','_self')</script>";  
}  
?>