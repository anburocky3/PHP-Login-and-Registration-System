<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cubewrld";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Unable to connect to database because". mysqli_connect_error());
}
else{
    echo "Connection Successful<br>";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "INSERT INTO `users` (`sno`, `name`, `email`, `password`) VALUES (NULL, '$name', '$email', '$password')";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo "Record added successfully";
        }
        else{
            echo mysqli_error($conn);
        }


        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        header("location: index.php");
    }

}
?>