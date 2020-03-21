


<!DOCTYPE html>
<html>
<head>
      <title>ROOMS</title>
</head>
<body align="center">
      <br>
<table  width="1200" border="7"  cellpadding="5"  cellspacing="2" align="center">


<tr>

<th>Number</th>
<th>Type</th>
<th>Facilities</th>
<th>Image</th>
<th>Hotel</th>
<th>Price</th>
<th>status</th>

</tr>


<?php 

//connect to db
$mysqli= NEW MySQLI('localhost','root','','booking');

//Query
$resultSet = $mysqli->query("SELECT * FROM rooms");


//Query
// $resultSet1=$mysqli->query("SELECT * FROM hotels where  approved =1 ");
// while($hotel=mysql_fetch_assoc($resultSet1)){

// $result=$hotel['name'];

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
       $status=$rows['status'];


//$result = $_GET['image'];
//echo '< img src="images/gallery/'.$result.'">';

echo "<tr>";
echo "<td>" . $rows['id'] . "</td>";
echo "<td>" . $rows['type']. "</td>";
echo "<td>" . $rows['facilites'] . "</td>";
echo "<td>" . $roomImage . "</td>";
echo "<td>" . $rows['hotelId'] . "</td>";
echo "<td>" . $rows['price'] . "</td>";
echo "<td>" . $rows['status'] . "</td>";
echo "</tr>";

      // echo "<p>Name:$hotelName Location: $hotelLocation stars:$stars suspend: $suspend rating: $rating Owner: $owner_id   ";

      }

}

 ?>
 
 
 </table>
 <br>

<!-- <form method="POST" action="customerPage.php">

            <div class="input-group" align="center">
                  <label>roomno</label>
                  <input type="int" name="roomno" >
            </div>
            
            <div class="input-group"  align="center">
                  <button type="submit" class="btn" name="reserve">reserve</button>
            </div>
              </form>

<br> -->
<br>
              <!-- <form method="POST" action="customerPage.php">

            <div class="input-group" align="center">
                  <label>Search</label>
                  <input type="text" name="search" >
            </div>
            
            <div class="input-group"  align="center">
                  <button type="submit" class="btn" name="search">Search</button>
            </div>
              </form>
              <br> -->


<link rel="stylesheet" type="text/css" href="style.css">
<title>search</title>
<form method="post" action="">
  <div class="container">
 
<div class="input-group">
    
  
  <label for="type"><b>type</b></label>
    <input type="text" placeholder="Enter type  of the rooms" id="type" name="type" >
  
    <label for="price"><b>price</b></label>
    <input type="text" placeholder="Enter price" id="price" name="price" >
  
  <label for="location"><b>location</b></label>
    <input type="text" placeholder="Enter location" id="location" name="location" >
  
  <label for="stars"><b>stars</b></label>
    <input type="int" placeholder="Enter stars" id="stars" name="stars" >
  
  <label for="rating"><b>rating</b></label>
    <input type="int" placeholder="Enter stars" id="rating" name="rating" >
  
  <input name= "search" type= "submit" >
  </div>
  <!-- <p> <a href="memindex.php?logout='1'" style="color: red;">logout</a> </p> -->

</form>

           <?php

       session_start(); 

if (isset($_post['search'])){
      $db = mysqli_connect('localhost', 'root', '', 'booking');

$sql1 ="CREATE TABLE test (id int(11)
,type VARCHAR(255)                     
,facilities VARCHAR(255)            
,image longblob         
,hotelId varchar(255)
, price int(11)
,status VARCHAR(255)
,count int(11)
,tt VARCHAR(50)
,location VARCHAR(10)
,stars int      
,suspended int    
,approved int
,rating int   
,owner_id int  
 );";
    $result4=mysqli_query($db,$sql1); 

echo ("sup");



  $rating = mysqli_real_escape_string($db, $_POST['rating']);
  $type = mysqli_real_escape_string($db, $_POST['type']);
  $price = mysqli_real_escape_string($db, $_POST['price']);
  $location = mysqli_real_escape_string($db, $_POST['location']);
  $stars = mysqli_real_escape_string($db, $_POST['stars']);
   $sqol="drop table test";
   $result3=mysqli_query($db,$sqol); 
  

$sql1 ="INSERT INTO test (id,type,facilities,image,hotelId,price,status,count,tt,location,stars,suspended,approved,rating,owner_id)
SELECT * FROM rooms INNER JOIN hotels ON hotels.name=rooms.hotelId;
";
$result2=mysqli_query($db,$sql1);
$sql2 = "ALTER TABLE test drop tt;";
$result1=mysqli_query($db,$sql2);

  if (!empty($rating)){
    $query_select = mysqli_query($db,"delete from test where rating<>$rating or rating is null");
    
  }
  if (!empty($location)){
    $query_select = mysqli_query($db,"delete from test where location<>'$location'");
  }
  if (!empty($stars)){
    $query_select = mysqli_query($db,"delete from test where star<>'$star'");
  }
  if (!empty($price)){
    $query_select = mysqli_query($db,"delete from test where price<>'$price'");
  }
  if (!empty($type)){
    $query_select = mysqli_query($db,"delete from test where type<>'$type'");
  }

   
}

   ?>


</body>
</html>

<html>
<head>
  
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  
    Search:   <a href="search.php">Search</a>
  
   <table>
 <tr>
  <th>hotel name  </th> 
  <th>  stars</th> 
  <th>rating</th>
    <th>location</th>
  <th>facilities</th>
    <th>type</th>
    <th>price</th>
        <th>image</th>



 </tr>
  <?php
    $db = mysqli_connect('localhost', 'root', '', 'booking');
    $select=mysqli_query($db,"select * FROM test ");
    
    while ($hotel = mysqli_fetch_assoc($select))
    {
      
    echo( "<tr><td>". $hotel['hotelId']. "</td><td>" .$hotel['stars']. "</td><td>" .$hotel['rating']. "</td><td>" .$hotel['location']. "</td><td>" .$hotel['facilities']. "</td><td>" .$hotel['type']. "</td><td>" .$hotel['price']. "</td></tr>" );
    
    }
    echo "</table>";
  ?>
