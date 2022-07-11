<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cubewrld";
    
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    if(!$conn){
        die("Unable to connect to database because". mysqli_connect_error());
    }

    // $useremail = $_SESSION['email'];
    // $sql = "SELECT * FROM `cart` WHERE useremail='$useremail'";
    // $result = mysqli_query($conn, $sql);

    // if(!$result){
    //     echo mysqli_error($conn);
    // }
    // else{
    //     if($row = mysqli_fetch_assoc($result)){

    //     }
    // }

    $useremail = $_SESSION['email'];
    $sno = $_GET['sno'];
    $sql = "INSERT INTO `cart` (`product sno`, `useremail`, `quantity`) VALUES ('$sno', '$useremail', '1')";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Successful!!";
        header("location: cart.php");
    }
    else{
        echo mysqli_error($conn);
    }
?>