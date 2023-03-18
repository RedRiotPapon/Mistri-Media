<!DOCTYPE html>
<html lang="en">
<?php
include 'security.php';
include 'connection.php';
if (isset($_POST['submit'])) {
$email= $_SESSION['Email'];
$amnt= $_POST['amnt'];
$bal=$_SESSION['Balance'];
$bal=$bal+$amnt;
$sql = "UPDATE hirer SET Balance='$req'   WHERE email='$email'";
header('location :Home.php#carouselExampleIndicators');
}
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <title>Bootstrap 5.0 Pricing Table</title>

  <style>
    /* Nav bar starts here */

    nav {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      width: 70%;
      z-index: 45;
      position: absolute;
      top: 2%;
      left: 50%;
      transform: translate(-50%, -50%);
      position: fixed;
      background-color: #0abdf8;
      margin-bottom: 50px;
    }

    ul {
      position: sticky;
      padding: 0;
      margin: 0;

    }

    ul li {
      background: rgb(255, 255, 255);
      float: left;
      list-style: none;
      width: 20%;
      opacity: 0.8;
    }

    ul li a {
      text-transform: capitalize;
      color: rgb(0, 0, 0);
      padding: 14px 26px;
      text-decoration: none;
      display: inline-block;
      /*used to give this a buttonlike vibe centers list item horizonatally*/
      font-size: 140%;

    }


    ul li:hover {
      background: rgb(179, 179, 179);

    }

    .dropcontent {
      background: #fff;
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.3);
      display: none;
      position: absolute;
    }

    .dropcontent a {
      display: block;

      color: black;
    }

    .dropdown:hover .dropcontent {
      display: block;
    }

    header {
      color: rgb(250, 250, 250);
      display: flex;
      align-items: center;
      justify-content: center;

    }

    /* Nav bar ends here */
    .card1:hover {
      background: #00ffb6;
      border: 1px solid #00ffb6;
    }

    .card1:hover .list-group-item {
      background: #00ffb6 !important
    }

body{
  background-color: #00C9FF;
}



    .card2:hover {
      background: #00C9FF;
      border: 1px solid #00C9FF;
    }

    .card2:hover .list-group-item {
      background: #00C9FF !important
    }


    .card3:hover {
      background: #ff95e9;
      border: 1px solid #ff95e9;
    }

    .card3:hover .list-group-item {
      background: #ff95e9 !important
    }


    .card:hover .btn-outline-dark {
      color: white;
      background: #212529;
    }
  </style>

</head>
<header>
  <nav class='menu'>
    ​<ul>

      <li><a href="Home.php">home</a></li>
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

<body>


  <div class="container-fluid">
    <div class="container p-5">
      <div class="row">
        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card card1 h-100">
            <div class="card-body">

              <h5 class="card-title">Basic</h5>
              <small class='text-muted'>Daily Package</small>
              <br><br>
              <span class="h2">700 BDT</span>/Day
              <br><br>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Earum maiores consequatur magnam ab officiis vero harum laudantium quo facere. Quod, sunt quisquam officia iure omnis provident esse odit fugiat tempora.
            </div>


          </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card card2 h-100">
            <div class="card-body">

              <h5 class="card-title">Standard</h5>
              <small class='text-muted'>3 day Package</small>
              <br><br>
              <span class="h2">650 bdt</span>/Day
              <br><br>

              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores quasi quidem vel. Repellendus eum, autem consequatur magnam expedita aut, labore fuga eaque, ipsum nulla neque eius reiciendis fugiat libero pariatur.
            </div>


          </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card card3 h-100">
            <div class="card-body">

              <h5 class="card-title">Premium</h5>
              <small class='text-muted'>7 day Package</small>
              <br><br>
              <span class="h2">600 BDT</span>/Day
              <br><br>

              Lorem ipsum dolor sit amet consectetur, adipisicing elit. A, perferendis harum. Eum numquam cupiditate, modi consequatur ipsam sequi impedit ullam ad laudantium provident reiciendis nulla dolor, magni quia? Ab, dolorum.
            </div>


          </div>
        </div>
      
      </div>
    </div>
</body>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


</body>

</html>