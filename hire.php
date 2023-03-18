<!DOCTYPE html>
<?php 
include 'security.php';
include 'connection.php';


    ?>
      <?php $datetime = date_create()->format('Y-m-d H:i:s');
                ?> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     if (isset($_POST['hirebtn'])) {
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }
          $workerid  = $_POST['edit']; 
          $reserved  = $_POST['options']; 
          $transaction =  $reserved*700;
          $reserved = $reserved*86400 ;
          $hmail = $_SESSION['Email'];
          $Balance =$_SESSION['Balance'];
          $Spent =  $_SESSION['Spent'];
          $Balance=$Balance - $transaction;
          $Spent  = $Spent + $transaction;
          
          $sql = "UPDATE workers SET Request = '$reserved' ,TaskDate='$datetime', hirer='$hmail' WHERE id='$workerid'";
          mysqli_query($conn, $sql);
          $isql = "UPDATE hirer SET  Balance = '$Balance' ,TotalSpent='$Spent'  WHERE email ='$hmail'";
          mysqli_query($conn, $isql);
          header("Location: Home.php#userGrid");
          exit();
     }
    ?>
</body>
</html>