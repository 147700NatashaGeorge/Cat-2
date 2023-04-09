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
  <h1>Sign Up</h1>
  <br>
  <form action="" method="POST">
    <input type="text" name="fname" required placeholder="Fullname">
    <br>
    <input type="text" name="phone" required placeholder="Phone Number">
    <br>
    <input type="email" name="email" required placeholder="Email Address">
    <br>
    <select name="gender" required>
      <option disabled selected>Select A Gender</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
    <br>
    <input type="password" name="password" required placeholder="Password">
    <br>
    <input type="submit" name="signup" required value="Sign Up">
  </form>
</div>
</body>
</html>

<?php

$con = mysqli_connect("localhost","root","","cat_two");

if (isset($_POST['signup'])) {

 $fname = $_POST['fname'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];
 $gender = $_POST['gender'];
 $password = $_POST['password'];
   
    $sql = "INSERT INTO `users`(`fullname`, `phone_number`, `email_address`, `gender`, `password`) VALUES ('$fname','$phone','$email','$gender','$password')";

     mysqli_query($con, $sql);
     header("Location: signin.php");
}

?>