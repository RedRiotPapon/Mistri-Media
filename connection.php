<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Project";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$dbconfig= mysqli_select_db ($conn,$dbname);

  
?>