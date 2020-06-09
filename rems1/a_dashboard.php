<?php 
  session_start(); 

   if (!isset($_SESSION['admin_email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: admin.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['admin_email']);
    header("location: admin.php");
  }
  ?>
  
  <?php
  $db = mysqli_connect("localhost", "root", "", "rems1");

  if (isset($_POST['users'])) {
  	$result = mysqli_query($db, "SELECT * FROM users");
   }
   else{
    $result = mysqli_query($db, "SELECT * FROM users where email = 'abc'");
   }

   if (isset($_POST['props'])) {
    $result1 = mysqli_query($db, "SELECT * FROM property2");
   }
   else{
    $result1 = mysqli_query($db, "SELECT * FROM property2 where pid = -1");
   }

   if (isset($_POST['trans'])) {
    $result2 = mysqli_query($db, "SELECT * FROM booking1 inner join booking2 on booking1.pid=booking2.pid");
   }
   else{
    $result2 = mysqli_query($db, "SELECT * FROM users where email = 'abc'");
   }
   
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <style>
   ul{
     list-style-type: none;
     margin: 0;
     padding: 0;
     overflow: hidden;
     background-color: #00203FFF;
   }
   li{
     float: left;
   }
   li a{
     display: block;
     color: #ffffff;
     text-align: center;
     padding: 14px 16px;
     text-decoration: none;
   }
   li a:hover{
     background-color: #379683;
   }
   li button{
     color: #ffffff;
     text-align: center;
     padding: 14px 16px;
     text-decoration: none;
     background-color: #00203FFF;
   }
   li button:hover{
     background-color: #379683;
   }
   table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
th{
  background-color: #00203FFF;
  color: white;
  text-align: left;
  padding: 8px;
  border: 2px solid #dddddd;
}
td {
  border: 2px solid #dddddd;
  text-align: left;
  padding: 8px;
}
tr:nth-child(odd) {
  background-color: #f1f1f1;
}
tr:nth-child(even) {
  background-color: #ffffff;
}
form{
    width: 100%;
   }
   form div{
    width: 80%;
    padding-top: 40px;
    margin: 0 auto;
   }
  </style>
</head>
<body style="background-color: #ADEFD1FF">
  <form method="POST" action="a_dashboard.php" enctype="multipart/form-data">

    <?php  if (isset($_SESSION['admin_email'])) : ?>
	  <ul>
      <li style="float: right;"> <a href="admin.php?logout='1'">Logout</a></li>
      <li> <button type="submit" name="users">View Users</li>
      <li> <button type="submit" name="props">View Properties</button></li>
      <li> <button type="submit" name="trans">View Transactions</button></li>
	  </ul>
    <?php endif ?>

      <div>
      <?php
      echo "<table>";
      if (isset($_POST['users'])){
        echo "<tr><th>Name</th><th>email</th><th>Contact no.</th><th>Address</th></tr>";
      }
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td>{$row['username']}</td><td>{$row['email']}</td><td>{$row['contact']}</td><td>{$row['address']}</td></tr>";
        }
        echo "</table>";

        echo "<table>";
      if (isset($_POST['props'])){
        echo "<tr><th>Name</th><th>Price</th><th>Pincode</th><th>Status</th></tr>";
      }
        while ($row1 = mysqli_fetch_array($result1)) {
            echo "<tr><td>{$row1['pname']}</td><td>{$row1['price']}</td><td>{$row1['location']}</td><td>{$row1['status']}</td></tr>";
        }
        echo "</table>";

        echo "<table>";
      if (isset($_POST['trans'])){
        echo "<tr><th>Owner email</th><th>Property ID</th><th>Buyer email</th></tr>";
      }
        while ($row2 = mysqli_fetch_array($result2)) {
            echo "<tr><td>{$row2['o_email']}</td><td>{$row2['pid']}</td><td>{$row2['b_email']}</td></tr>";
        }
        echo "</table>";

      ?> 
    </div>
</form>
</body>
</html>