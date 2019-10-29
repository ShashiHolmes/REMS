<?php 
 session_start(); 
 
  if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: login.php");
  }
?>

<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "rems1");

  // Initialize message variable
  $msg = "";
  $email = $_SESSION['email'];
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get pname
    $pname = mysqli_real_escape_string($db, $_POST['pname']);
    // Get text
    $description = mysqli_real_escape_string($db, $_POST['description']);
    //Get price
    $price = mysqli_real_escape_string($db, $_POST['price']);
    //Get location
    $location = mysqli_real_escape_string($db, $_POST['location']);

    $key = mysqli_real_escape_string($db, $_POST['key_code']);

    $key_code = md5($key);
    // image file directory
    $target = "property2/".basename($image);
    //Insert the details to property2 table
    $sql = "INSERT INTO property2 (image, pname, description, price, location, key_code ) VALUES ('$image', '$pname', '$description', '$price', '$location', '$key_code')";
    // execute query
    //mysqli_query($db, $sql);
    //Insert the details to property1 table
    $get_email = $_SESSION['email'];
	  $sql1 = "INSERT INTO property1 (email) VALUES('$get_email')";
    mysqli_query($db, $sql1);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Successful";
    }else{
      $msg = "Failed";
    }

    if(mysqli_query($db, $sql)){
      header('Location: index.php');
      exit;
    }

  }
  //$result1 = mysqli_query($db, "SELECT * FROM property2 ");
  $result = mysqli_query($db, "SELECT * FROM property2 where status='unsold'");
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
    <?php  if (isset($_SESSION['email'])) : ?>
	  <ul>
      <li> <a href="index.php?logout='1'">logout</a></li>
      <li> <a href="profile.php">profile</a></li>
      <li> <a href="search.php">Search</a></li>
	  </ul>
    <?php endif ?>
</div>

<form method="POST" action="index.php" enctype="multipart/form-data">
    <div id="content1">
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

      <input type="hidden" name="size" value="1000000000">
      <div>
        <input type="file" name="image">
      </div>
      <div>
        <textarea 
          id="text0" 
          cols="40" 
          rows="1" 
          name="pname" 
          placeholder="Property name..."></textarea>
      </div>
      <div>
        <textarea 
          id="text" 
          cols="40" 
          rows="4" 
          name="description" 
          placeholder="Property description..."></textarea>
      </div>
      <div>
        <textarea 
          id="text1" 
          cols="40" 
          rows="1" 
          name="price" 
          placeholder="Enter price in Indian Rs"></textarea>
      </div>
      <div>
        <textarea 
          id="text2" 
          cols="40" 
          rows="1" 
          name="location" 
          placeholder="Enter the pincode"></textarea>
      </div>
      <div>
        <input
          type="password" 
          id="text3"  
          rows="1" 
          name="key_code" 
          placeholder="Enter the key code" style="width: 295px">
      </div>
      <div>
        <button type="submit" name="upload">Sell</button>
      </div>
    </div>
</form>
</body>
</html>

<?php
if(isset($_POST['btn'])){
  foreach($_POST['btn'] as $key => $value){
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
