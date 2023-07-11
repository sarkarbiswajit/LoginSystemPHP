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

$sql = "delete from users where email = '$mail'";
$result = mysqli_query($conn,$sql);
if($result){
    echo "Successfully deleted";
}else{
    echo "Deletion failed";
}

?>

<?php 
session_start();

$_SESSION = array();

session_destroy();

header("location: login.php");
exit;

?>