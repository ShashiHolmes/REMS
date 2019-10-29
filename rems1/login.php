<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>User login</title>
  <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
	<div class="login-page">
  <div class="login-form">
  <div class="form">
	 
  <form class="login-form" method="post" action="login.php">
  	<?php include('errors.php'); ?>
	<input type="text" name="email" placeholder="Email" /><br><br>
	<input type="password" name="password" placeholder="password" /><br><br>
  	<button type="submit" class="btn" name="login_user">Login</button>
  	<p class="message">
  		Not yet a member? <a class="forgot" href="register.php">Create an account</a>
  	</p>
  </form>
  </div>
  </div>
</div>
</body>
</html>
