<!DOCTYPE html>
<html lang="en">
<?php
include 'adsecity.php';
include 'connection.php';
include 'php-mysql-fix-master/fix_mysql.inc.php';
//$_SESSION['Deletion'];
if (!isset($_SESSION['Email'])) {
    header('Location: Admin.php');
  }

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="AdminPannel.css">
    <title>AdminPannel</title>
</head>
<header>

</header>
<script type="text/javascript">
    function SomeFunction2() {
        var isdlt = 0;
        console.log(isdlt);
        isdlt = <?php echo $_SESSION['Deletion'] ?>;
        console.log(isdlt);
        if (isdlt == 2) {
            document.getElementById('scrolledRight1').style.display = "block";
            document.getElementById('fixedright1').style.display = "none";
            document.getElementById('scrolledRight2').style.display = "none";
        }



    }

    function SomeFunction() {

        var isupdt = 0;
        console.log(isupdt);
        isupdt = <?php echo $_SESSION['Update'] ?>;

        console.log(isupdt);

        if (isupdt == 2) {
            document.getElementById('scrolledRight1').style.display = "block";
            document.getElementById('fixedright1').style.display = "none";
            document.getElementById('scrolledRight2').style.display = "none";
        }



    }
</script>

<body onload="SomeFunction();SomeFunction2()">
    <selection class="description">
        <div class="fixedLeft">
            <button class="btn-change5" id="adminlogo" onclick="replace(this.id);">
                Home
            </button>
            <button class="btn-change5" id="hirer" onclick="replace(this.id);">
                Hirer
            </button>
            <button class="btn-change5" id="worker" onclick="replace(this.id);">
                Worker
            </button>
            <button class="btn-change5" type="submit" id="logout" name="logout" onclick="window.location.href='adminlogout.php'" formmethod="POST"  >
                logout
            </button>

        </div>
        <div class="scrolledRight">
            <div class="fixed-right" id="fixedright1">
                <img src="image/3075837.png" class="img-fluid" alt="Responsive image">
                <div class="containergrid">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header">Admin Panel</div>
                        <div class="card-body">
                            <h5 class="card-title">Add Admin</h5>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="InputEmail1">Email</label>
                                    <input type="text" name="editemail" class="form-control" id="InputEmail1" aria-describedby="emailHelp" >
                                </div>
                                <button class="btn btn-danger" name=""addadmin>Add</button>
                            </form>
                        </div>
                    </div>
                    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                        <div class="card-header">Hirers</div>
                        <div class="card-body">
                            <h5 class="card-title">Number of Hirers</h5>
                            <h1 class="card-text">
                                <?php 
                           $sql = "SELECT * FROM Hirer";

                           $result = mysqli_query($conn, $sql);
                           
                           $num_rows = mysqli_num_rows($result);
                           echo $num_rows;
                           ?>
                             
                            </h1>
                        </div>
                    </div>
                    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                        <div class="card-header">Workers</div>
                        <div class="card-body">
                            <h5 class="card-title">Number of Workers</h5>
                            <h1 class="card-text">
                                <?php 
                           $sql = "SELECT * FROM Workers";

                           $result = mysqli_query($conn, $sql);
                           
                           $num_rows = mysqli_num_rows($result);
                           echo $num_rows;
                           ?>
                             
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="scrolledRight1" id="scrolledRight1">

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Location</th>
                                <th scope="col">Occupation</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "select * from workers ";
                            $query_run = mysqli_query($conn, $query);

                            $check_id = mysqli_num_rows($query_run) > 0;
                            if ($check_id) {
                                while ($row = mysqli_fetch_assoc($query_run)) {  ?>

                                    <tr>
                                        <th scope="row"><?php echo $row['id']; ?></th>
                                        <td><?php echo $row['firstName']; ?> <?php echo $row['lastName']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['Phone']; ?></td>
                                        <td><?php echo $row['locations']; ?></td>
                                        <td><?php echo $row['OCCUPATION']; ?></td>
                                        <td>
                                            <form action="workerEdit.php" method="POST">
                                                <input type="hidden" name="edit" value="<?php echo $row['id'] ?>">
                                                <button type="submit" name="worker_editbtn" class="btn btn-success"> EDIT </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="insertdeleteupdate.php" method="POST">
                                                <input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
                                                <button type="'submit" name="worker_deletebtn" class="btn btn-danger">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>

                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="scrolledRight2" id="scrolledRight2">

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Location</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "select * from hirer ";
                            $query_run = mysqli_query($conn, $query);

                            $check_id = mysqli_num_rows($query_run) > 0;
                            if ($check_id) {
                                while ($row = mysqli_fetch_assoc($query_run)) {  ?>

                                    <tr>
                                        <th scope="row"><?php echo $row['id']; ?></th>
                                        <td><?php echo $row['Name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['Phone']; ?></td>
                                        <td><?php echo $row['locations']; ?></td>
                                        <td>
                                            <form action="hirerEdit.php" method="POST">
                                                <input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
                                                <button type="'submit" name="h_deletebtn" class="btn btn-danger">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>

                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <footer>
                <i class="fa fa-copyright" aria-hidden="true">Copyright 2022</i>
            </footer>
        </div>
    </selection>
</body>
<script type="text/javascript">
    function replace(buttonid) {
        console.log(buttonid);
        const buttons = ["worker", "hirer", "adminlogo"];
        const divs = ["scrolledRight1", "scrolledRight2", "fixedright1"]
        for (let i = 0; i < buttons.length; i++) {
            if (buttons[i] != buttonid) {
                document.getElementById(divs[i]).style.display = "none";
                console.log(divs[i]);
            } else {
                document.getElementById(divs[i]).style.display = "block";
                console.log(divs[i]);
            }


        }

        // document.getElementById('fixedright1').style.display = "none";
        //document.getElementById('scrolledRight1').style.display = "block";
    } //scrollIntoView();
</script>


</html>