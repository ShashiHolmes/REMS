<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
<div class="login-page">
	<div class="login-form">
  <div class="form">
  <form class="login-form" method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	  <input type="text" name="username" placeholder="Name" value="<?php echo $username; ?>"/>

  	  <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>"/>

  	  <input type="number"  name="contact" placeholder="Contact number" value="<?php echo $contact; ?>"/>


  	  <input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>"/>
		<input type="password" name="password_1" placeholder="password">

  	  <input type="password" name="password_2" placeholder="confirm password">


  	  <button type="submit" class="btn" name="reg_user">Register</button>

  	<p class="message">
  		Already registered? <a href="login.php">Sign in</a>
  	</p>
  </form>
</div>
</div>
</div>
</body>
</html>
