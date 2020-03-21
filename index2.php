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
<form method="POST" action="index2.php">
<br>
	<div class="input-group">
		<h2>Enter your room options</h2>
		<br>
		     <label>hotelName</label>
			<input type="text" name="hotelId" required="" >

            <label>Type</label>
			<input type="text" name="roomType" required="" >
			<label>Price</label>
			<input type="int" name="roomPrice" required="">

			<label>Facilities</label>
			<input type="text" name="roomFacilities" required="">

		      <label>image</label>
			<input type="text" name="roomImage" required="">


			   <label>count</label>
			<input type="text" name="roomCount" required="">
<!-- 
			<label>Status(free-reserved-accupied)</label>
			<input type="text" name="roomStatus" required=""> -->
		</div>

		<div class="input-group">
			<button type="submit" class="btn" name="confirmRoom">Confirm</button>
		</div>

	</form>
</body>
</html>

<?php 

	$db = mysqli_connect('localhost', 'root', '', 'booking');


	if (isset($_POST['confirmRoom'])) { // msh by5osh hena el if de

	// variable declaration
	$username=$_SESSION['username'];
	$hotelId=$_POST['hotelId'];
	$roomType=$_POST['roomType'];
    $roomPrice=$_POST['roomPrice'];
    $roomFacilities=$_POST['roomFacilities'];
    $roomImage=$_POST['roomImage'];
    $roomCount=$_POST['roomCount'];
    // $roomStatus=$_POST['roomStatus'];
//     $id=$_SESSION['id'];
// $query = "SELECT * FROM hotels WHERE owner_id='$id'";
// $result=mysqli_query($db, $query);
// $id1=mysqli_fetch_assoc($result);		
	// $id2= $id1['id'];
for($i=0;$i<$roomCount;$i=$i+1){
$query = "INSERT INTO rooms (hotelId,type,price, facilites,image,count) 
					  VALUES('$hotelId','$roomType', '$roomPrice', '$roomFacilities','$roomImage','$roomCount')";
			mysqli_query($db, $query);
			    echo "$roomType";

}

	$_SESSION['success'] = "";
}

	// connect to database







 ?>