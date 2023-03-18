<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Project";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$email = $_POST['Email'];
$password = $_POST['Password'];
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // username and password sent from form 
            
            $Email= $_POST['Email'];
            $Password =$_POST['Password']; 
            
            $wflag=0;
            
            if (isset($_POST['signinWorker']))
            {   $wflag=1;
                $sql = "select * from workers where email='$Email' and  Password ='$Password';";
            }
            else{
                $sql = "select * from hirer where Email='$Email' and  Password ='$Password';";
                
            }
            $res = mysqli_query($conn,$sql); 
            $resultCheck = mysqli_num_rows($res);
            if($resultCheck>0)
            {

                session_start();
                $_SESSION['hold'] = time();
               $_SESSION['Email'] = $Email;
               if($wflag)
               {
                while ($row = mysqli_fetch_assoc($res)) {
                $req = $row['Request'];
                $_SESSION['Req'] =$req;
                }
                header("location: WorkerProfile.php");
               }
               else{
                while ($row = mysqli_fetch_assoc($res)) {
                    $Balance  = $row['Balance'];
                    $Spent    = $row['TotalSpent'];
                    $_SESSION['Balance'] =$Balance ;
                    $_SESSION['Spent'] =$Spent ;
                    $_SESSION['locations']=$row['locations'];
                    }
                 header("location: Home.php#carouselExampleIndicators");
               }
              
            }


            
            // If result matched $myusername and $mypassword, table row must be 1 row

         }


    }
   
  
?>