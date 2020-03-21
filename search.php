
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
