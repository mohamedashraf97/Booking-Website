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
      
      <h2>Black Listing customer </h2> 
      <div class = "container form-signin">

         
         <?php
            $msg = '';
            
            if (isset($_POST['BlackList'])   ) {
                     $db = mysqli_connect('localhost', 'root', '', 'booking');

                      // header('location: customerPage.php');
                 $resultSet = mysqli_query($db,"SELECT id FROM customers WHERE appeared = 0");
                 $rows = $resultSet->fetch_assoc();

       $id=$rows['id'];
   
    $query = "UPDATE customers
   SET blacklisted=1 
    WHERE id='$id'";

                 $result= mysqli_query($db, $query);
            
             echo 'this customer has been blacklisted';
            }
         ?>
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
        <label> Customer to be blacklisted</label> <br>
            <input type = "int" class = "form-control" 
               name ="cBlackList" placeholder = "customerId" 
               required autofocus></br>
            
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "BlackList">BlackList</button>

         </form>
         
 
         
      </div> 
      
   </body>
</html>