<?php
    include_once('connection.php');

    $delete_id=$_GET['del']; 

    $selectquery = "SELECT * FROM closedentries where id='$delete_id'";
    $result = mysqli_query($conn, $selectquery);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $closedname=$row['name'];
    $closeddepartment=$row['department'];
    $closedlocation=$row['location'];
    $closedassettno=$row['assettno'];
    $closeddescription=$row['description'];
    $createdat=$row['createdat'];
    $closedprogress=$row['exprogress'];

    debug_to_console($closedprogress);
    $delete_query="delete  from closedentries WHERE id='$delete_id'";//delete query  
    $runn=mysqli_query($conn,$delete_query);  
    if($runn)  
    {  
        //javascript function to open in the same window   
        echo "<script>window.open('closedentriesall.php?deleted=user has been deleted','_self')</script>";  
    }  
?>