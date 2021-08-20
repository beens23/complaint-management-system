<?php  
    include_once 'connection.php';
    $_SESSION['isLoggedIn']=false;
    session_destroy();
    if (session_status() === PHP_SESSION_NONE) {
        header("Location: index.php");
    }
?>


