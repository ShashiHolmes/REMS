<?php
	session_start();
	
	$db = mysqli_connect("localhost", "root", "", "rems1");
    
    $email = $_SESSION['email'];
    $o_email = $_SESSION['o_email'];
    $price = $_SESSION['price'];
    $pid = $_SESSION['pid'];
    $trans = md5($pid);

    $sql = "SELECT * FROM users where email='$email'";
    $sql1 = "SELECT * FROM users where email='$o_email'";
    $sql2 = "SELECT * FROM booking1 where pid='$pid'";

    $result = mysqli_query($db, $sql);
    $result1 = mysqli_query($db, $sql1);
    $result2 = mysqli_query($db, $sql2);

    if($row = mysqli_fetch_array($result)) {
          $username = $row['username'];
        }

    if($row1 = mysqli_fetch_array($result1)) {
          $o_username = $row1['username'];
        } 

    if($row2 = mysqli_fetch_array($result2)) {
          $bid = $row2['bid'];
        } 

    $query = "INSERT INTO payment (bid, trans_ref) VALUES ('$bid', '$trans')";
    mysqli_query($db, $query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Success</title>
	<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
ul{
     list-style-type: none;
     margin: 0;
     padding: 0;
     overflow: hidden;
     background-color: rgb(23, 158, 6);
   }
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
li{
     float: right;
   }
   li a{
     display: block;
     color: white;
     text-align: center;
     padding: 14px 16px;
     text-decoration: none;

   }
   li a:hover{
     background-color: #111;

   }
tr:nth-child(even) {
  background-color: rgb(170, 238, 172);
}
</style>
</head>
<body>
	  <ul>
	  		<h1 align="center">Transaction Succesful</h1>
      		<li> <a href="index.php">Home</a></li>
	  </ul>
<table>
  <tr>
  	<td>Client Name</td>
    <th><?php echo "$username"; ?></th>
  </tr>
  <tr>
    <td>Paid to</td>
    <th><?php echo "$o_username"; ?></th>
  </tr>
  <tr>
    <td>Amount</td>
    <th><?php echo "Rs. $price"; ?></th>
  </tr>
  <tr>
    <td>Transaction Reference No.</td>
    <th><?php echo "$trans"; ?></th>
  </tr>
</table>
</body>
</html>