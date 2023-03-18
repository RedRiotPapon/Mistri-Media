<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile Card UI Design</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="Electrician.css">
</head>
<header class="hcontainer">

    <nav class='menu'>
        ​<ul>
    
            <li><a href="#">home</a></li>
            <li><a href="#">contact</a></li>
            <li class="dropdown">
                <a href="#">Services</a>
                <div class="dropcontent">
                    <a href="#">Electrician</a>
                    <a href="#">Mechanic</a>
                    <a href="#">mason</a>
                </div>
            </li> 
             <li><a href="#">about</a></li>
             <li><a href="#">more</a></li>
            
         </ul>
      
      </nav>
      </header>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$dbconfig= mysqli_select_db ($conn,$dbname);

  
?>

	<section class="main-content">
    <div class="card-deck">
    <?php
				$query = "select * from workers";
                      $query_run = mysqli_query($conn, $query);

                    $check_id = mysqli_num_rows($query_run) > 0;
                if($check_id){
                while($row = mysqli_fetch_assoc ($query_run))
                 {  
				?>
  <div class="card">
  <img src="electricianbg.png" alt="" class="img-circle mx-auto mb-3">
    <div class="card-body">
      <h5 class="card-title"><?php echo $row['firstName'] ; ?>  <?php echo $row['lastName'] ; ?></h5>
      <div class="text-left mb-4">
								<p class="mb-2"><i class="fa fa-envelope mr-2"></i> <?php echo $row['email']; ?></p>
								<p class="mb-2"><i class="fa fa-phone mr-2"></i> <?php echo $row['Phone']; ?></p>
								<p class="mb-2"><i class="fa fa-map-marker-alt mr-2"></i><?php echo $row['locations']; ?></p>
                                <p class="mb-2"><i class="fa fa-bullhorn"></i> <?php echo $row['OCCUPATION']; ?></p>
							</div>
    </div>
    <div class="card-footer">
    <p class="mb-2"><i class="fa fa-star "></i> <?php echo $row['Rating']; ?></p>
    

    </div>
  </div>
  <?php
				 }
				}
                 ?>
</div>
	</section>
	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>