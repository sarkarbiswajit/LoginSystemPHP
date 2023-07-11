<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'partials/nav.php' ?>
    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $pass = $_POST['password'];


        $servername = "localhost";
$username = "root";
$password = "";
$database = "dblab8";

// Create a connection
$conn = mysqli_connect($servername, $username, $password,$database);
// Die if connection was not successful

$sql = "select *from users where email ='$email' and password = '$pass' ";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);

if($num==1){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>You are Successfully Registered! Now you can login</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>';
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['email'] = $email;
    
      header("location: userHome.php");
}else{
    echo '<div class="alert alert-danger" role="alert">
  Invalid credentials!
</div>';
}
        
      // Submit these to a database
    }
    ?>

	<div class="container mt-5">
		<h2>Login</h2>
		<form action="/mydata/login.php" method="post">
			
			<div class="form-group">
				<label for="email">Email:</label>
        <br>
				<input type="email" class="form-control" id="email" placeholder="Enter Email" required name="email">
				<div class="invalid-feedback">Please enter a valid email address.</div>
			</div>
      <br>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" placeholder="Enter Password" required name="password">
			</div>
			<br>
			<button type="submit" class="btn btn-primary">Login</button>
		</form>
	</div>
</body>
</html>