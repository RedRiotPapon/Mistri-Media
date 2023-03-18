<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
	$userName = $_POST['Name'];
    $lastName = $_POST['lName'];
	$email = $_POST['Email'];
	$password = $_POST['Password'];
	$number = $_POST['Phone'];
    $location =$_POST['District'];
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
        
        $flag=0;
        $wflag=0;
        if (isset($_POST['signupWorker']))
        {
            $sql = "select email from workers;";
            $wflag=1;
        }
        else{
             $sql = "select email from hirer;";
        }
       
    $res = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($res);
    if($resultCheck>0)
    {
        while($row = mysqli_fetch_assoc($res)){
            if ($row['email']==$email) 
            {
                $flag=1;
            }
        }
    } 
    if (!$flag && !$wflag){

		$stmt = $conn->prepare("insert into hirer(Name,lastName	,Password,email	,locations,	Phone	) values( ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $userName,$lastName, $password, $email,  $location,$number);
        
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successful";
		$stmt->close();
		$conn->close();
        header("location: landingpage.php");
    }
    if(!$flag && $wflag)
    {
        $stmt = $conn->prepare("insert into workers(firstName,lastName,Password,email,locations,Phone	) values( ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $userName,$lastName, $password, $email,  $location,$number);
        
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successful";
		$stmt->close();
		$conn->close();
        header("location: landingpage.php");
    }



       
	}
?>
