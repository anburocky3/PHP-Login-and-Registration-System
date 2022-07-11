<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container my-4">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product Name</label>
                <input type="text" class="form-control" name=name id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Price</label>
                <input type="number" name=price class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Stock</label>
                <input type="number" name=stock class="form-control" id="exampleInputPassword1">
            </div>
            <div>
                <label>Add Product Image</label><br>
                <input type="file" name="image" id="image"><br>
            </div>
            <div class="mb-3 my-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Agree With Our terms and conditions</label>
            </div>
            <input class="btn btn-primary" name=upload type="submit" value="Upload Your Product">
            <!-- <button type="submit" name="upload" class="btn btn-primary">Submit</button> -->
        </form>
            
            

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "cubewrld";
        
        $conn = mysqli_connect($servername, $username, $password, $database);
        
        if(!$conn){
            die("Unable to connect to database because". mysqli_connect_error());
        }
        if(isset($_POST['upload'])){
            $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
            $name = $_POST['name'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];

            $sql = "INSERT INTO `products` (`sno`, `name`, `price`, `image`, `stock`) VALUES (NULL, '$name', '$price', '$file', '$stock')";
            $result = mysqli_query($conn, $sql);

            if($result){
                echo "Successful!!";
            }
            else{
                echo mysqli_error($conn);
            }
        }
        ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>