<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration as owner</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background="1.jpg">
	<div class="header">
		<h2>Register as hotel owner 1</h2>
	</div>
	
	<form name="myForm" action="register.php" onsubmit="return validateForm()" method="post">

		<?php include('errors.php'); ?>
       <!--     
               <div class="input-group">
			<label>ID</label>
			<input type="text" name="id" value="<?php echo $id; ?>">
		</div>
 -->
		<div class="input-group">
			<label>name</label>
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
		<!-- <div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div> -->
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			already got an account? <a href="login.php">Sign in</a>
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