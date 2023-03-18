<!DOCTYPE html>
<?php
session_start();
$Role = $_SESSION['role'];

$loc = $_SESSION['locations'];
if (!isset($_SESSION['Email'])) {
  header('Location: landingpage.php');
}

?>
<html lang="en">
<?php

?>

<head>
  <meta charset="UTF-8">
  <title>Profile Card UI Design</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <link rel="stylesheet" type="text/css" href="Electrician.css">
</head>
<header class="hcontainer">
  <img src="handyman22.png" class="img-fluid" alt="Responsive image">
  <nav class='menu'>
    ​<ul>

      <li><a href="Home.php#carouselExampleIndicators">home</a></li>
      <li class="dropdown">
        <a href="Home.php#services">Services</a>
        <div class="dropcontent">
        <a href="#">Electrician</a>
                        <a href="Worker.php#profilecards">Mechanic</a>
                        <a href="Worker.php#profilecards">Plumber</a>
                        <a href="Worker.php#profilecards">Blacksmith</a>
                        <a href="Worker.php#profilecards">Mason</a>
                        <a href="Worker.php#profilecards">Carpenter</a>
        </div>
      </li>
      <li><a href="pricing.php">Pricing</a></li>
      <li><a href="Home.php#userGrid">User</a></li>
      <li><a href="logout.php">Logout</a></li>

    </ul>

  </nav>
</header>

<body >
  <section class="filter">
    <div id="myBtnContainer">
      <button class="btn" name="servtoelec.php" id="Electrician" onclick="jump(this.id,this.name);">Electrician </button>
      <button class="btn" name="servtomech.php" id="Mechanic" onclick="jump(this.id,this.name);"> Mechanic </button>
      <button class="btn" name="servtoplumber.php" id="Plumber" onclick="jump(this.id,this.name);"> Plumber </button>
      <button class="btn" name="servtocarp.php" id="Carpenter" onclick="jump(this.id,this.name);"> Carpenter </button>
      <button class="btn" name="servtomason.php" id="Mason" onclick="jump(this.id,this.name);"> Mason </button>
      <button class="btn" name="servtoblack.php" id="Blacksmith" onclick="jump(this.id,this.name);"> Blacksmith </button>

    </div>
  </section>




  <section id="profilecards">

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Project";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $dbconfig = mysqli_select_db($conn, $dbname);


    ?>

    <section class="main-content">
      <div class="card-deck">
        <?php
        $query = "select * from workers where OCCUPATION = '$Role' and locations='$loc'";
        $query_run = mysqli_query($conn, $query);

        $check_id = mysqli_num_rows($query_run) > 0;
        if ($check_id) {
          while ($row = mysqli_fetch_assoc($query_run)) {
        ?>
            <div class="card">
              <img src="electricianbg.png" alt="" class="img-circle mx-auto mb-3">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['firstName']; ?> <?php echo $row['lastName']; ?></h5>
                <div class="text-left mb-4">
                  <p class="mb-2"><i class="fa fa-envelope mr-2"></i> <?php echo $row['email']; ?></p>
                  <p class="mb-2"><i class="fa fa-phone mr-2"></i> <?php echo $row['Phone']; ?></p>
                  <p class="mb-2"><i class="fa fa-map-marker-alt mr-2"></i><?php echo $row['locations']; ?></p>
                  <p class="mb-2"><i class="fa fa-bullhorn"></i> <?php echo $row['OCCUPATION']; ?></p>
                </div>
                <?php $datetime = date_create()->format('Y-m-d H:i:s');
                ?>
                <form action="hire.php" method="POST">
                  <select class="form-select" name="options" aria-label="Default select example">
                    <option selected>Select a Package</option>
                    <option value="1">1 day</option>
                    <option value="3">3 day</option>
                    <option value="7">7 day</option>
                  </select>
                  <button class="btn-change5" id="hire" name="hirebtn"> Hire Me </button>
                  <input type="hidden" name="edit" value="<?php echo $row['id'] ?>">
                </form>
                
              </div>
              <div class="card-footer bg-primary">
                <p class="mb-2"><i class="fa fa-star "></i>Deals: <?php echo $row['DealDone']; ?></p>
                <?php $req=$row['Request'];
                      $acp = $row['Accept'];
                ?>

              </div>
            </div>
        <?php
          }
        }
        ?>
      </div>
    </section>
  </section>




  <script type="text/javascript">

    function jump(buttonId, buttonName) {
      // var buttonName = event.target.name;

      var name = '<?php echo $Role; ?>';
      if (buttonId == name) {
        document.getElementById('profilecards').scrollIntoView();
      } else {
        window.location.href = buttonName;
      }
      console.log(buttonName);
      console.log(buttonId);
      console.log(name);

    }
  </script>

<script type="text/javascript">
function disableBtn() {
      var a = '<?php echo $req; ?>';
      var b =  '<?php echo $acp; ?>';
      if(a<1 && b<1)
      {

        document.getElementById("hire").disabled = true;
        document.getElementById("hire").style.color = 'Red';
      }

   
}
</script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>