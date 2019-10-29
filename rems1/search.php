<?php 
  session_start(); 
 
  $db = mysqli_connect("localhost", "root", "", "rems1");

  $email = $_SESSION['email'];

  if (isset($_POST['search'])) {
  	$min_price = mysqli_real_escape_string($db, $_POST['min_price']);
  	$max_price = mysqli_real_escape_string($db, $_POST['max_price']);
  	$pin = mysqli_real_escape_string($db, $_POST['pin']);
  	$result = mysqli_query($db, "SELECT * FROM property2 where status='unsold' AND price >='$min_price' AND price<='$max_price' AND location = '$pin'");
   }
   else{
   	$result = mysqli_query($db, "SELECT * FROM property2 where status='un'");
   }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div>
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
	  <ul>
      <li> <a href="index.php?logout='1'">logout</a></li>
      <li> <a href="profile.php">profile</a></li>
      <li> <a href="index.php">Home</a></li>
      <!-- <li> <input type="text" name="loc" placeholder="Pincode"></li>
      <li> <input type="text" name="max_price"></li>
      <li> <input type="text" name="min_price"></li> -->
	  </ul>
    <?php endif ?>
</div>

<form method="POST" action="search.php" enctype="multipart/form-data">
    <div id="content1">
      <div>
        <input type="number"
          id="text1" 
          cols="40" 
          rows="1" 
          name="min_price" 
          placeholder="Minimum price">
      </div>
      <div>
        <input type="number"
          id="text2" 
          cols="40" 
          rows="1" 
          name="max_price" 
          placeholder="Maximum price">
      </div>
      <div>
        <input type="number"
          id="text3" 
          cols="40" 
          rows="1" 
          name="pin" 
          placeholder="Enter pincode">
      </div>
      <div>
        <button type="submit" name="search">Search</button>
      </div>

      <?php
        while ($row = mysqli_fetch_array($result)) {
          $pid =$row['pid'];
          echo "<div id='img_div'>";
            echo "<img src='property2/".$row['image']."' >";
            echo "<p><b>".$row['pname']."</b></p>"; 
            $name = 'btn['.$pid.']';
            echo "<p><i>".$row['description']."</i></p>";
            echo "<p><b>".$row['price']."</b></p>";
            echo "<p>".$row['location']."</p>";
            echo "<button type='submit' name= '$name' value = '$name'>BUY</button>";
            
          echo "</div>";
        }
      ?> 
    </div>
</form>
</body>
</html>

<?php
if(isset($_POST['btn'])){
  foreach($_POST['btn'] as $key => $value){
    // echo "Button {$key}:{$value} pressed";
    $sql2 = "SELECT * FROM property1 where pid='$key'";
    $result2 = mysqli_query($db, $sql2);
    $row2 = mysqli_fetch_array($result2);
    $new_email = $row2['email'];
    if($email != $new_email){
    	header("Location: buy.php?key=$key");
    }
  }
}
?>
