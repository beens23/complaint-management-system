<?php
    include_once('connection.php');

    $delete_id=$_GET['del']; 

    $selectquery = "SELECT * FROM complaintform where id='$delete_id'";
    $result = mysqli_query($conn, $selectquery);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $closedname=$row['name'];
    $closeddepartment=$row['department'];
    $closedlocation=$row['location'];
    $closedassettno=$row['assettno'];
    $closeddescription=$row['description'];
    $createdat=$row['createdat'];
    $closedprogress=$row['progress'];

    debug_to_console($closedprogress);
    $insertquery = "INSERT INTO closedentries(name,department,location,assettno,description,createdat,exprogress) VALUES('$closedname','$closeddepartment','$closedlocation','$closedassettno','$closeddescription','$createdat','$closedprogress') ";
    $run=mysqli_query($conn,$insertquery);
    $delete_query="delete  from complaintform WHERE id='$delete_id'";//delete query  
    $runn=mysqli_query($conn,$delete_query);  
    if($runn)  
    {  
        //javascript function to open in the same window   
        echo "<script>window.open('displayentries.php?deleted=user has been deleted','_self')</script>";  
    }  
?>