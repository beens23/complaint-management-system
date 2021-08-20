<?php   
    include_once 'connection.php';
    userLoggedIn();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="google" content="notranslate">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Closed Entries</title>
    <link rel = "stylesheet" type = "text/css" href = "styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css">
    <script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
    <link href="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <img src="images/logo.jpg" alt="AGCL Logo" width="280" height="80"><br><br><br>
    <br>
    <div class="header">
        <h3><b>Closed Complaint Entries:</b></h3>
    </div>
    <br><br><br>
    <form action=""  method="POST">
    <div class="row">
    <div class="col">
        <p><label> Department: <br>(Leave it blank if you want to search for all the departments) <select id="DEPT" name="department">
                    <option value="IT">IT </option>
                    <option value="O & M">O & M </option>
                    <option value="GMB">GMB </option>
                    <option value="Pipeline">Pipeline</option>
                    <option value="Instrumentation">Instrumentation</option>
                    <option value="HSE">HSE</option>
                    <option value="HRA">HRA</option>
                    <option value="F&A">F&A</option>
                    <option value="Materials">Materials</option>
                    <option value="P&U">P&U</option>
                    <option value="Transport">Transport</option>
                    <option value="Security">Security</option>
                    <option value="SCADA">SCADA</option>
                    <option value="Civil">Civil</option>
                    <option value="Land">Land</option>
                    <option value="Medical"> Medical</option>
                </select></p>
                <script>
                    $('#DEPT').editableSelect();
                </script>
        </div>
        <!-- //Modify the Form Fields to suit the needs of your website. -->
        <div class="col">
         <label>From:</label><br>
        <input type="datetime-local" name="from" required/> <br>
        </div>
        <div class="col">
        <label>To:</label><br>
        <input type="datetime-local" name="to" required/>
        </div>
    </div>
    <br>
		<input type="submit" name="search" id = "btn" value = "Search">
		</form>
        <a href="itdept.php">Back to Home</a>
    <table class="table table-bordered table-striped">
  <thead>
    <tr>
    <th scope="col">ID</th>
    <th scope="col">Name</th>
    <th scope="col">Department</th>
    <th scope="col">Location</th>
    <th scope="col">Assets Number</th>
    <th scope="col">Description</th>
    <th scope="col">exProgress</th>
    <th scope="col">Complaint Filed at:</th>
    <th scope="col">Complaint closed at:</th>
    </tr>
  </thead>
  <tbody>
        <?php
            // echo $_SESSION['department'];
            if(isset($_POST['search'])) 
            {       
                $department=$_POST['department'];
                $from=$_POST['from'];
                $to=$_POST['to'];
                
                if($department==NULL)
                {
                    $selectquery = "SELECT * FROM closedentries where closedat between '$from' and '$to'"  ;
                }else
                {
                    $selectquery = "SELECT * FROM closedentries where (closedat between '$from' and '$to') and department='$department' ";

                }
                
                $result = mysqli_query($conn,$selectquery);
                

                $i=1;
                while($res = mysqli_fetch_array($result)){

        ?>
        <tr>
            <th scope="row"><?php echo $i;?></th>
            <td><?php print $res['name']; ?></td>
            <td><?php print $res['department'];?></td>
            <td><?php print $res['location'];?></td>
            <td><?php print $res['location'];?></td>
            <td><?php print $res['assettno'];?></td>
            <td><?php print nl2br( $res['exprogress'] ); ?></td>
            <td><?php print $res['createdat'];?></td>
            <td><?php print $res['closedat'];?></td>
        </tr>
        <?php
                    $i++;
                }
                
            }
            
        ?>
  </tbody>
</table>
<br>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<a href="itdept.php">Back to Home</a>
</body>
</html>
