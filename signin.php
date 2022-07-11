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
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        if($num == 1){
            $row = mysqli_fetch_assoc($result);
            echo $num;
            
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $email;
            header("location: index.php");
        }
        else{
            echo "Invalid Credentials";
        }

        // if($result){
        //     echo "Record fetched successfully";
        // }
        // else{
        //     echo mysqli_error($conn);
        // }


        
    }

}
?>