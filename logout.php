<?php
 
    echo "Logged out successfully";
    
    session_start();
    $_SESSION['loggedin'] = false;
    session_destroy();

    header("location: index.php");
 
?>