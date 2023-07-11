<?php
    $servername = "localhost";
$username = "root";
$password = "";
$database = "db2";

// Create a connection
$conn = mysqli_connect($servername, $username, $password,$database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo "Connection was successful<br>";
}
$sql = "insert into stud values('prioritys90@gmail.com','123434')";
$result = mysqli_query($conn,$sql);
if($result){
    echo "data inserted";
}else{
    echo "data insertion failed";
}
?>