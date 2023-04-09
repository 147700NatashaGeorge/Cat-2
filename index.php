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
  <li><a href="index.php">Home</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
  </div>
<div>
  <h1>Table of Users</h1>
  <br>
	   <table>
                <tr style="text-align: left;
                  padding: 8px;">
                <th style="text-align: left;
                  padding: 8px;">User ID</th>
                <th style="text-align: left;
                  padding: 8px;">Name</th>
                <th style="text-align: left;
                  padding: 8px;">Phone </th>
                <th style="text-align: left;
                  padding: 8px;">Email </th>
                <th style="text-align: left;
                  padding: 8px;">Gender </th>
                  <th style="text-align: left;
                  padding: 8px;">Password</th>
                </tr>

                <?php
                $conn = mysqli_connect("localhost", "root", "", "cat_two");
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

$sql = "SELECT `user_id`, `fullname`, `phone_number`, `email_address`, `gender`, `password` FROM `users`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["user_id"]); ?></td>
<td><?php echo($row["fullname"]); ?></td>
<td><?php echo($row["phone_number"]); ?></td>
<td><?php echo($row["email_address"]); ?></td>
<td><?php echo($row["gender"]); ?></td>
<td><?php echo($row["password"]); ?></td>
</tr>
<?php
}
} else { echo "0 results"; }
$conn->close();
?>
                </table>
</div>
<br>
<br>
<div>
  <h1>Update User Details</h1>
  <br>
  <form action="" method="POST">
    <select name="uid" required> 
    <option disabled selected value="">Select A User ID</option>
    <?php
    $con = mysqli_connect("localhost","root","","cat_two");
    $sql = "SELECT `user_id` FROM `users`";
    $result = mysqli_query($con,$sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)):;
    ?>
    <option value="<?php echo $row["user_id"];?>"><?php echo $row["user_id"];?></option>
    <?php endwhile; ?>
    </select>  
    <br>
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
    <input type="submit" name="up" required value="Update">
  </form>
</div>
</body>
</html>

<?php

$con = mysqli_connect("localhost","root","","cat_two");

if (isset($_POST['up'])) {
 $uid = $_POST['uid'];
 $fname = $_POST['fname'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];
 $gender = $_POST['gender'];
 $password = $_POST['password'];
   
   $sql = "UPDATE `users` SET `fullname` = '$fname', `phone_number` = '$phone', `email_address` = '$email', `gender` = '$gender', `password` = '$password' WHERE `user_id` = '$uid'";
     mysqli_query($con, $sql);
     header("Location: index.php");
}

?>