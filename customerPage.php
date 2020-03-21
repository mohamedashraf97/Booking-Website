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
      
      <h2>Booking Room WebSite </h2> 
      <div class = "container form-signin">

         
         <?php
            $msg = '';
            
            if (isset($_POST['reserve'])   ) {
                     $db = mysqli_connect('localhost', 'root', '', 'booking');

        //         $hotelId=$rows['name'];
        // echo($hotelId);
        $roomNumber=$_POST['roomNumber'];
        $startDate=$_POST['startDate'];
        $endDate=$_POST['endDate'];

        echo($roomNumber);


      $query = "UPDATE rooms
   SET status=1 
    WHERE  status=0 && id='$roomNumber'";

                 $result= mysqli_query($db, $query);
                // header('location: customerPage.php');
                 $resultSet = mysqli_query($db,"SELECT price, hotelId FROM rooms");
                 $rows = $resultSet->fetch_assoc();

       $price=$rows['price'];
       $hotelId=$rows['hotelId'];
   
    $query = "INSERT INTO reservations (startDate, endDate, roomId,hotelId,pricePerDay) 
                 VALUES('$startDate', '$endDate', '$roomNumber','$hotelId','$price')";

                 $result= mysqli_query($db, $query);
            
             echo 'hey i want to reserve room number'.$_POST['roomNumber'];
            }
         ?>
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
        <label> RoomNumber</label> <br>
            <input type = "int" class = "form-control" 
               name ="roomNumber" placeholder = "roomNumber" 
               required autofocus></br>
                <label> startDate</label> <br>
            <input type = "date" class = "form-control" 
               name ="startDate" placeholder = "startDate" 
               required autofocus></br>
                <label> EndDate</label> <br>
            <input type = "date" class = "form-control" 
               name ="endDate" placeholder = "endDate" 
               required autofocus></br>
            
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "reserve">reserve</button>

               <p>
      wanna see all rooms? <a href="Rooms.php">LOOK</a>
      </p>
         </form>
         
 
         
      </div> 
      
   </body>
</html>