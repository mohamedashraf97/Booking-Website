<!DOCTYPE html>
<html>
<head>
  <title>ROOMS</title>
</head>
<body  background="bg.jpg">
  <br>
  <h1 align="center">Reserved rooms</h1>
<br>
<table  width="900" border="5"  cellpadding="5"  cellspacing="2" align="center">

<tr>

<th>Number</th>
<th>Type</th>
<th>Facilities</th>
<th>Image</th>
<th>Hotel</th>
<th>Price</th>

</tr>


<?php 

//connect to db
$mysqli= NEW MySQLI('localhost','root','','booking');

//Query
$resultSet = $mysqli->query("SELECT * FROM rooms WHERE status=1");


//Query
// $resultSet1=$mysqli->query("SELECT * FROM hotels where  approved =1 ");
// while($hotel=mysql_fetch_assoc($resultSet1)){

// $result=$hotel['hotelId'];

// while($row=mysql_fetch_assoc($resultSet1)){

// $resultSet = $mysqli->query("SELECT * FROM rooms where hotelId='$result'");

if($resultSet->num_rows !=0){

//results to array
  while($rows = $resultSet->fetch_assoc())
//while($rows = mysqli_fetch_field($result))
  {
       $roomNumber=$rows['id'];
       $roomType=$rows['type'];
       $roomFacilities=$rows['facilites'];
       $roomImage=$rows['image'];
       $Hotel=$rows['hotelId'];
       $roomPrice=$rows['price'];


//$result = $_GET['image'];
//echo '< img src="images/gallery/'.$result.'">';

echo "<tr>";
echo "<td>" . $rows['id'] . "</td>";
echo "<td>" . $rows['type']. "</td>";
echo "<td>" . $rows['facilites'] . "</td>";
echo "<td>" . $roomImage . "</td>";
echo "<td>" . $rows['hotelId'] . "</td>";
echo "<td>" . $rows['price'] . "</td>";
echo "</tr>";

      // echo "<p>Name:$hotelName Location: $hotelLocation stars:$stars suspend: $suspend rating: $rating Owner: $owner_id   ";

  }

}

 ?>
 
 
 </table>
 <br>

            <?php

       session_start(); 

      $db = mysqli_connect('localhost', 'root', '', 'booking');

      if (isset($_POST['reserve'])) {
          $hotelId=$rows['hotelId'];
        echo($hotelId);
        $roomno=$_POST['roomno'];
        echo($roomno);
          echo("asdaf");


      $query = "UPDATE rooms
   SET status=1 ,count= '$roomsAvailable-1'
    WHERE hotelId='$hotelId' && status=0 && id='$roomno'";

                  mysqli_query($db, $query);
                 header('location: customerPage.php');

}



   ?>
</body>
</html>


