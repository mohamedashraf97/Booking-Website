<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background="1.jpg">

	<div class="header">
		<h2>Login as broker</h2>
	</div>
	
	<form method="post" action="loginBroker.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>email</label>
			<input type="email" name="email"  required="">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" required="">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="loginBroker">Login</button>
		</div>
		<p>
			Hotel owner:  <a href="login.php">hotel owner</a>
			<br>
		    Customer:   <a href="loginCustomer.php">Customer</a>
		</p>
	</form>


</body>
</html>