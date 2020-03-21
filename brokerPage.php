<!DOCTYPE html>
<html>
<head>
	<title>HOTELS</title>
</head>
<body background="bg.jpg" align="center">
	<br>
<table  width="900" border="7"  cellpadding="7"  cellspacing="4" align="center" >


<tr>

<th>Name</th>
<th>Location</th>
<th>Stars</th>
<th>Suspend</th>
<th>Rating</th>
<th>Owner</th>

</tr>


<?php 

//connect to db
$mysqli= NEW MySQLI('localhost','root','','booking');

//Query
$resultSet = $mysqli->query("SELECT * FROM hotels");

if($resultSet->num_rows !=0){

//results to array
	while($rows = $resultSet->fetch_assoc())
//while($rows = mysqli_fetch_field($result))
	{
       $hotelName=$rows['name'];
       $hotelLocation=$rows['location'];
       $stars=$rows['star'];
       $suspend=$rows['suspend'];
       $rating=$rows['rating'];
       $owner_id=$rows['owner_Id'];

echo "<tr>";
echo "<td>" . $rows['name'] . "</td>";
echo "<td>" . $rows['location']. "</td>";
echo "<td>" . $rows['star']. "</td>";
echo "<td>" . $rows['suspend'] . "</td>";
echo "<td>" . $rows['rating'] . "</td>";
echo "<td>" . $rows['owner_Id'] . "</td>";

echo "</tr>";

      // echo "<p>Name:$hotelName Location: $hotelLocation stars:$stars suspend: $suspend rating: $rating Owner: $owner_id   ";

	}

}

 ?>
 
 </table>
 <br>
 <br>

       Reservations <a href="reservations.php">LOOK</a>
       <br>
       blacklist customers <a href="blackList.php">blacklist someone</a>
       <br>
       Hotels to be approved <a href="request.php">requests</a>
       <br>
       Payments<a href="Payment.php">Payment</a>



</body>
</html>
