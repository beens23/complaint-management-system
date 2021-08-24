<?php
    include_once('connection.php');
    // userLoggedIn();
?>
<html>
<head>
    <title>PHP login system</title>
    <link rel = "stylesheet" type = "text/css" href = "styles.css">
    <script>
        windows.history.forward();
    });
</script>
</head>
<body>
    <img src="images/logo.jpg" alt="AGCL Logo" width="280" height="80">
    <div class="header">
		<h2>IT Department</h2>
		<h4>Complaint Management System</h4>
	</div>
    <div id = "frm">
        <h1>Login</h1>
        <form name="f1" action = "" method = "POST">
            <p>
                <label> Email:<br> </label>
                <input type = "email" id ="email" name  = "email" required />
            </p>
            <p>
                <label> Password: <br></label>
                <input type = "password" id ="password" name  = "password" required/>
            </p>
            <p>
                <input type =  "submit" name="submit" id = "btn" value = "Login" />
            </p>
            <a href="registration.php">Don't have an account? Sign up!</a>
        </form>
    </div>
</body>

</html>
<?php
    if(isset($_POST['submit'])) 
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        //to prevent from mysqli injection
        $email = stripcslashes($email);
        $password = stripcslashes($password);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "select *from users where id = '$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if (password_verify($password, $row['password'])) {
            $_SESSION['name']=$row['username'];
            $_SESSION['email']=$row['id'];
            $_SESSION['isLoggedIn']=true;
            $_SESSION['department']=$row['department'];
            $_SESSION['password']=$row['passsword'];
            debug_to_console($_SESSION['department']);
            if($_SESSION['department']=="admin"){
                ?>
                <script>
                    window.location.replace("itdept.php");
                </script>
                <?php 
            }
            else{
                ?>
                <script>
                    window.location.replace("home.php");
                </script>
                <?php 
            }
        }
        else{
            echo "<h1> Login failed. Invalid username or password.</h1>";
        }
    }
?>

