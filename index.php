<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body background="1.jpg">
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">

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
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> <a href="index.php?logout='1'" style="color: coral;">logout</a> </p>
		<?php endif ?>
	</div>
<form method="POST" action="index.php">

	<div class="input-group">
		<h2>Enter your hotel options</h2>
		<br>


		<label>ownerId</label>
			<input type="int" name="owner_Id" required="" >

		     <label>Name</label>
			<input type="text" name="hotelName" required="" >
		
		     <label>Location</label>
			<input type="text" name="hotelLocation" required="" >


			<label>Rating</label>
			<input type="int" name="hotelRating" required="">

			<label>Stars</label>
			<input type="int" name="hotelStars" required="">

		</div>


<br>
	
		<div class="input-group">
			<button type="submit" class="btn" name="confirmHotel">Confirm</button>
		</div>
		<br>
<div>
	<h1>Click to add Rooms</h1>
<p> <a href="index2.php" style="color: coral;">Rooms</a> </p>

</div>
<br>
	</form>
</body>
</html>

<?php 

	$db = mysqli_connect('localhost', 'root', '', 'booking');


	if (isset($_POST['confirmHotel'])) {

	// variable declaration
	
    // $roomStatus=$_POST['roomStatus'];
    echo ($_SESSION['username']);

    $owner_Id=$_POST['owner_Id'];
    $hotelName=$_POST['hotelName'];
    $hotelLocation=$_POST['hotelLocation'];
    $hotelRating=$_POST['hotelRating'];
    $hotelStars=$_POST['hotelStars'];

	$query = "INSERT INTO hotels (owner_Id,name, location,rating,star) 
					  VALUES('$owner_Id','$hotelName', '$hotelLocation', '$hotelRating','$hotelStars')";
			mysqli_query($db, $query);
echo($_SESSION['username']);

	$_SESSION['success'] = "";
}

	// connect to database







 ?>