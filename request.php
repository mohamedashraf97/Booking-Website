<?php
   ob_start();
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>

<html lang = "en">
   
   <head>
      <title>Tutorialspoint.com</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      
      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #ADABAB;
         }
         
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #017572;
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
         }
         
         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
         }
         
         h2{
            text-align: center;
            color: #017572;
         }
      </style>
      
   </head>
   
   <body>
      
      <h2>Hotel requests</h2> 
      <div class = "container form-signin">

         
         <?php


            $msg = '';

            
            if (isset($_POST['request'])   ) {
                     $db = mysqli_connect('localhost', 'root', '', 'booking');

                      // header('location: customerPage.php');
                 $resultSet = mysqli_query($db,"SELECT name FROM hotels WHERE approved = 0");
                 $rows = $resultSet->fetch_assoc();

       $name=$rows['name'];
   
    $query = "UPDATE hotels
   SET approved=1 
    WHERE name='$name'";

                 $result= mysqli_query($db, $query);
            
             echo 'this hotel has been approved';
            }
         ?>
<!DOCTYPE html>
<html>
<head>
      <title>hotels</title>
</head>
<body align="center">
      <br>
<table  width="1200" border="7"  cellpadding="5"  cellspacing="2" align="center">


<tr>

<th>name</th>
<th>location</th>
<th>Facilities</th>
<th>star</th>
<th>owner_id</th>
<th>Premium</th>

</tr>

         <?php 

$mysqli= NEW MySQLI('localhost','root','','booking');

$resultSet = $mysqli->query("SELECT * FROM hotels WHERE approved=0");

if($resultSet->num_rows !=0){

      while($rows = $resultSet->fetch_assoc())

 {
       $name=$rows['name'];
       $location=$rows['location'];
       $star=$rows['star'];
       $rating=$rows['rating'];
       $owner_Id=$rows['owner_Id'];
       $premium=$rows['premium'];


echo "<tr>";
echo "<td>" . $rows['name'] . "</td>";
echo "<td>" . $rows['location']. "</td>";
echo "<td>" . $rows['star'] . "</td>";
echo "<td>" . $rows['rating'] . "</td>";
echo "<td>" . $rows['owner_Id']. "</td>";
echo "<td>" . $rows['premium'] . "</td>";
echo "</tr>";



      }

}

 ?>
 
 
 </table>
 <br>

      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
        <label> hotels requests</label> <br>
            <input type = "int" class = "form-control" 
               name ="request" placeholder = "request" 
               required autofocus></br>
            
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "request">APPROVE</button>

         </form>
         
 
         
      </div> 
      
   </body>
</html>