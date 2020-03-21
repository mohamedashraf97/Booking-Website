<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
        $id ="";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'booking');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }


		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO owner (id,name, email, password) 
					  VALUES('$id','$username', '$email', '$password_1')";
			mysqli_query($db, $query);

			$_SESSION['name'] = $name;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}
	if (isset($_POST['reg_Customer'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }


		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO customers (id,name, email, password) 
					  VALUES('$id','$username', '$email', '$password_1')";
			mysqli_query($db, $query);

			$_SESSION['name'] = $name;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// ... 


	// LOGIN USER
	if (isset($_POST['loginBroker'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

			$query = "SELECT * FROM brokers ";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['email'] = $email;
				$id=mysqli_fetch_assoc($results);		
				$_SESSION['success'] = "You are now logged in";
				header('location: brokerPage.php');
			}else {
				array_push($errors, "Wrong email/password combination");
			}
		
	}  




	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$query = "SELECT * FROM owner WHERE name='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$id=mysqli_fetch_assoc($results);		
				$_SESSION['id'] = $id1;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}  

	  //login customer

	if (isset($_POST['login_Customer'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$query = "SELECT * FROM customers WHERE name='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: customerPage.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>



