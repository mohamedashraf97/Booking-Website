<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background="1.jpg">
	<div class="header">
		<h2>Registeration Customer</h2>
	</div>
	
	<form name="myForm" action="registerCustomer.php" onsubmit="return validateForm()" method="post">

		<?php include('errors.php'); ?>
     
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
	
		<div class="input-group">
			<button type="submit" class="btn" name="reg_Customer">Register</button>
		</div>
		<p>
			got an account? <a href="loginCustomer.php">Sign in</a>
		</p>
	</form>
<script>


function validateForm() {
    var x = document.forms["myForm"]["username"].value;
   var y = document.forms["myForm"]["password_1"].value;
   var e = document.forms["myForm"]["email"].value;
   const regex = /([a-zA-Z0-9._%]+)(@)([a-zA-Z0-9._%]+)(.com)/gm;
   if(!regex.test(e))
   {
	   alert("wrong email format");
	   return;
   }
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
if (y == "") {
        alert("password must be filled out");
        return false;
    }


}


</script>
</body>
</html>