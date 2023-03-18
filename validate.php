<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Project";

include 'adsecity.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$email = $_POST['Email'];

$password = $_POST['Password'];
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            
            $Email= $_POST['Email'];
            $Password =$_POST['Password'];
                $sql = "select * from Admin where email='$Email' and  Password ='$Password';";
  
            $res = mysqli_query($conn,$sql); 
            $resultCheck = mysqli_num_rows($res);
            if($resultCheck>0)
            {

                session_start();
                $_SESSION['Email']=$email;
                $SESSION['hold'] = time();

                 header("location: AdminPannel.php");
            
            }


            
            // If result matched $myusername and $mypassword, table row must be 1 row

         }


    }
   
  
?>