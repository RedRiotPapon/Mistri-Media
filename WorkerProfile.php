<!DOCTYPE html>
<html lang="en">

<?php
include 'security.php';
include 'connection.php';
$time = time();

$Email = $_SESSION['Email'];
$rq= $_SESSION['Req'];
if (isset($_POST['accbtn'])) {
 $req = $_POST['req'];
 $req=$req/86400;
 $id =  $_POST['id'];
 $deal =  $_POST['DealDone'];
 $dealdone=$deal +1;
 $ren= $_SESSION['Earn'];
 if($req)
 {$sql = "UPDATE workers SET Request = '0' ,Accept='$req',DealDone='$dealdone',Earning='$ren'  WHERE id='$id'";
 mysqli_query($conn, $sql);
 $_SESSION['Req']='0';

}
}


?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="WorkerProfile.css">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
   
</head>
<header> <script type="text/javascript">
    function hide(){
        document.getElementById('btn').style.visibility="hidden";
    document.getElementById('btn2').style.visibility="hidden";
    }
function loadbtn(){
    var reqq=0;
 reqq= <?php echo $rq?> ;
console.log(reqq);
if(reqq>0){
    document.getElementById('btn').style.visibility="visible";
    document.getElementById('btn2').style.visibility="visible";
}
}
</script>
</header>
<body onload="loadbtn()">
<div class="container">
    <div class="main-body">
    <?php
				$query = "select * from workers where Email = '$Email'";
                      $query_run = mysqli_query($conn, $query);

                    $check_id = mysqli_num_rows($query_run) > 0;
                if($check_id){
                while($row = mysqli_fetch_assoc ($query_run))
                 {  $val = $row['Request'];
                    $val = $val/86400 ;
                    $assigndate = $row['TaskDate'];
                    if(($time-$assigndate)>20)
                    {
                        $_SESSION['Earn']=700*$val;
                    }
				?>

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">

            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4> <?php echo $row['firstName'] ; ?>  <?php echo $row['lastName'] ; ?></h4>
                      <p class="text-secondary mb-1"><?php echo $row['OCCUPATION']; ?></p>
                      <p class="text-muted font-size-sm"><?php echo $row['locations']; ?></p>
                      <?php if($row['Request']){$req='Work Request!';}else{$req='No Request';}  ?>
                       <pre> <?php echo $req; ?> 
Duration :<?php echo $val;  ?> Day
                       </pre>
                       <form method="post">
                       <input type="hidden" name="DealDone" value="<?php echo $row['DealDone'] ?>" >
                       <input type="hidden" name="id" value="<?php echo $row['id'] ?>" >
                        <input type="hidden" name="req" value="<?php echo $row['Request'] ?>" >
                      <button class="btn btn-primary" id="btn" name="accbtn" onclick="hide()">Accept</button>
                      <button class="btn btn-danger" id="btn2" name="rejbtn">Reject</button>
                       </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
               <p id="bio">
               I started working due to necessity, but I think along the way luxury became my necessity. I feel that no matter how much I make, it was not enough because there is always something else I need to have. I believe it is about the lifestyle I chose to live which is influenced by the society we live in.
               </p>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['firstName'] ; ?>  <?php echo $row['lastName'] ; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['email']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['Phone']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Profession</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['OCCUPATION']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Location</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['locations']; ?>
                    </div>
                  </div>
                  <hr>
                  <form method="POST">
                  <div class>
                  <a href="logout.php">Log out</a> 
                  </div>
                 </form>
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                     
                      <small> Current </small>
                      <h2><?php echo $row['Accept'] ; ?> Days</h2>
                      <div class="progress mb-3" style="height: 5px">
            
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <h2>
                        Lifetime Earning
                     </h2>
                     <h1>
                       <?php 
                       echo $row['Earning'] ; 
                       $_SESSION['Earning']=$row['Earning']?> ৳
                       </h1>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    
                    </div>
                  </div>
                </div>
              </div>



            </div>
          </div>
                 
              
        </div>
        <?php
				 }
				}
                 ?>
    </div>
</body>
</html>