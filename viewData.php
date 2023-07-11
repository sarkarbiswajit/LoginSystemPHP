<?php
session_start();

if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
    header("location : login.php");
    exit;
}

?>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "dblab8";

// Create a connection
$conn = mysqli_connect($servername, $username, $password,$database);
// Die if connection was not successful
$mail = $_SESSION['email'];

$sql = "select *from users where email = '$mail'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);

if($num==1){
    $row = mysqli_fetch_assoc($result);
}else{
    echo "Row not found";
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
  <body>
        <?php require 'partials/nav2.php' ?>
        <br>
        <div class="card">
  <div class="card-body">
    <h5 class="card-title">First Name: <?php echo $row['first_name']; ?></h5>
    <h5 class="card-title">Last Name: <?php echo $row['last_name']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Email : <?php echo $row['email']; ?></h6>
    <h6 class="card-subtitle mb-2 text-muted">Password : <?php echo $row['password']; ?></h6>
  </div>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>