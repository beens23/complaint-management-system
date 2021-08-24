<?php
    include_once 'connection.php';
    itDeptCheck();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="google" content="notranslate">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Entries</title>
    <link rel = "stylesheet" type = "text/css" href = "styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
    <img src="images/logo.jpg" alt="AGCL Logo" width="280" height="80"><br><br><br>
    <div class="header"><h3><b>All Pending Complaint Entries:</b></h3></div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Department</th>
                <th scope="col">Location</th>
                <th scope="col">Asset Number</th>
                <th scope="col">Description</th>
                <th scope="col">Progress</th>
            </tr>
        </thead>
  <tbody>
        <?php
            $selectquery = "SELECT * FROM complaintform";
            $query = mysqli_query($conn,$selectquery);
            $i=1;
            while($res = mysqli_fetch_array($query)){
        ?>
        <tr>
            <th scope="row" ><?php echo $i;?></th>
            <td><?php echo $res['name']; ?></td>
            <td><?php echo $res['department'];?></td>
            <td><?php echo $res['location'];?></td>
            <td><?php echo $res['assettno'];?></td>
            <td><?php echo $res['description'];?></td>
            <td>
                <?php print nl2br( $res['progress'] ); ?>
                </form>
            </td>
        </tr> 
        <?php
            $i++;
            }   
        ?>
  </tbody>
</table>
<br>
<a href="itdept.php">Back to Home</a>
</body>
</html>

