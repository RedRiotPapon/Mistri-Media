<!DOCTYPE html>
<?php
include 'connection.php';
include 'security.php';
if (!isset($_SESSION['Email'])) {
    header('Location: landingpage.php');
}
if (isset($_SESSION['hold'])) {
    $current = time();
    if ($current - $_SESSION['hold'] > 1000) {
        unset($_SESSION['Email']);
        header('Location: landingpage.php');
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <title>Document</title>
</head>
<header>
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

<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <section class="carossel">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="home1.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Fixing Up </h5>
                        <p>The whole caption will only show up if the screen is at least medium size.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="home2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="home3.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <div class="angry-grid" id="userGrid">
        <?php
        include 'connection.php';
        $Email = $_SESSION['Email'];
        $query = "select * from hirer where Email = '$Email'";
        $query_run = mysqli_query($conn, $query);

        $check_id = mysqli_num_rows($query_run) > 0;
        if ($check_id) {
            while ($row = mysqli_fetch_assoc($query_run)) { ?>
                <div id="item-0">
                    <div class="cards">
                        <img src="electricianbg.png" alt="" class="img-circle mx-auto mb-3">
                        <h1>><?php echo $row['Name']; ?> <?php echo $row['lastName']; ?></h1>

                        <h4>
                            <p class="mb-2"><i class="fa fa-envelope mr-2"></i> <?php echo $row['email']; ?></p>
                            <h4>
                                <h3>
                                    <p class="mb-2"><i class="fa fa-phone mr-2"></i> <?php echo $row['Phone']; ?></p>
                                </h3>
                                <h3>
                                    <p class="mb-2"><i class="fa fa-map-marker-alt mr-2"></i><?php echo $row['locations']; ?></p>
                                </h3>

                    </div>

                </div>
                <div id="item-1">
                    <div class="card text-center" style="width: 15rem;">
                        <div class="card-body">
                            <h3 class="card-title">Total Spent</h3>
                            <p class="card-text">In terms of BDT you have spent so far:</p>
                            <h2><?php echo $row['TotalSpent']; ?></h2>

                        </div>
                    </div>
                    <div class="card text-center" style="width: 15rem;">
                        <div class="card-body">
                            <h3 class="card-title">Current Balance</h3>
                            <p class="card-text">In terms of Website credit your balance is:</p>
                            <h2><?php echo $row['Balance']; ?></h2>

                        </div>
                    </div>


                </div>
                <div id="item-2">
                    <div class="dv">
                        <h2>Work in Progress </h2>
                    </div>
                    <?php
                    $gmail = $_SESSION['Email'];
                    $query = "select * from workers where Hirer = '$gmail'";
                    $query_run = mysqli_query($conn, $query);

                    $check_id = mysqli_num_rows($query_run) > 0;
                    if ($check_id) {
                        while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                            <h3>id: #<?php echo $row['id']; ?></h3>
                            <h3>Name: <?php echo $row['firstName']; ?><?php echo $row['lastName']; ?> </h3>
                    <?php
                        }
                    } ?>
                </div>
    </div>
    <div class="body" id="services">
        <div class="container">
            <div class="servicebox one">
                <div class="icon" style="--i:#09a5ff">
                    <img src="electrician.png" alt="">
                </div>
                <div class="details">
                    <p>
                        <br><br> <br>We have top quality Electrician to fix up your Electric problems
                    </p>
                    <div class="btn"><button onclick="window.location.href='servtoelec.php'">Check Out</button></div>

                </div>
            </div>
            <div class="servicebox two">
                <div class="icon " style="--i:#09a5ff">
                    <img src="mechanic.png" alt="">
                </div>
                <div class="details">
                    <p>
                        <br><br><br>
                        We have top quality Mechanics to fix up your Car
                    </p>
                    <div class="btn"><button onclick=" window.location.href='servtomech.php'">Check Out</button></div>
                </div>
            </div>
            <div class="servicebox three">
                <div class="icon" style="--i:#09a5ff">
                    <img src="builder.png" alt="">
                </div>
                <div class="details">
                    <p>
                        <br><br><br>
                        We have top quality Mechanics to fix up your Car
                    </p>
                    <div class="btn"><button onclick=" window.location.href='servtomason.php'">Check Out</button></div>
                </div>
            </div>
            <div class="servicebox four">
                <div class="icon " style="--i:#09a5ff">
                    <img src="carpenter.png" alt="">
                </div>
                <div class="details">
                    <p>
                        <br><br><br>
                        We have top quality Mechanics to fix up your Car
                    </p>
                    <div class="btn"><button onclick=" window.location.href='servtocarp.php'">Check Out</button></div>
                </div>
            </div>
            <div class="servicebox five">
                <div class="icon " style="--i:#09a5ff">
                    <img src="blacksmith.png" alt="">
                </div>
                <div class="details">
                    <p>
                        <br><br><br>
                        We have top quality Mechanics to fix up your Car
                    </p>
                    <div class="btn"><button onclick=" window.location.href='servtoblack.php'">Check Out</button></div>
                </div>
            </div>
            <div class="servicebox six">
                <div class="icon " style="--i:#09a5ff">
                    <img src="plumber.png" alt="">
                </div>
                <div class="details">
                    <p>
                        <br><br><br>
                        We have top quality Mechanics to fix up your Car
                    </p>
                    <div class="btn"><button onclick=" window.location.href='servtoplumber.php'">Check Out</button></div>
                </div>
            </div>
    <?php

            }
        }
    ?>
        </div>
    </div>
    <script type="text/javascript">
        function setRole(val)

        {
            var abc = val;

        }
    </script>

</body>



</body>

</html>