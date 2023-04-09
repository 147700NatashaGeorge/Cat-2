<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Web Development Cat Two</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div>
    <ul>
  <li><a href="signin.php">Sign In</a></li>
  <li><a href="signup.php">Sign Up</a></li>
</ul>
  </div>
  <br>
  <br>
<div>
  <h1>Sign In</h1>
  <br>
  <form action="" method="POST">
    <input type="text" name="emailorid" required placeholder="Email Address OR User ID">
    <br>
    <input type="password" name="password" required placeholder="Password">
    <br>
    <input type="submit" name="signin" required value="Sign In">
  </form>
</div>
</body>
</html>

<?php

$con = mysqli_connect("localhost","root","","cat_two");

if (isset($_POST['signin'])) {
 $emailorid = $_POST['emailorid'];
 $password = $_POST['password'];
   
    $sql = "SELECT * FROM `users` WHERE `email_address` = '$emailorid' OR `user_id` = '$emailorid' AND `Password`='$password'";

        $query = mysqli_query($con,$sql);

        if(mysqli_num_rows($query) > 0){
          header("Location: index.php");
}
}

?>