<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword ="";
$dbnName = "lab";
$conn = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbnName );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(!$conn){
        exit("failed to connect..... .....".mysqli_connect_error());
    }
    echo "Successful connection!!!!";
    ?>
    <?php
    $insert1 = "INSERT INTO student (name, roll, cgpa) VALUES ('Pnpob','1807089',3.43); ";
    $insert2 = "INSERT INTO student (name, roll, cgpa) VALUES ('Argho','1807066',3.46); ";
    $result1 = mysqli_query($conn,$insert1);
    $result2 = mysqli_query($conn,$insert2);
    $sql = "select * from student;";
    $res = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($res);
    if($resultCheck>0)
    {
        while($row = mysqli_fetch_assoc($res)){
            echo $row['Roll']."<br>";
        }
    } 




    ?>
    <a href="index.php">Sup</a>
</body>
</html>
























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
                                <th scope="col">Edit</th>
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
                                        <td><?php echo $row['Name']; ?> <?php echo $row['lastName']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['Phone']; ?></td>
                                        <td><?php echo $row['locations']; ?></td>
                                        <td>
                                            <form action="hirer_edit.php" method="POST">
                                                <input type="hidden" name="edit" value="<?php echo $row['id'] ?>">
                                                <button type="submit" name="worker_editbtn" class="btn btn-success"> EDIT </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="hirer_delete.php" method="POST">
                                                <input type="hidden" name="delete id" value="<?php echo $row['id'] ?>">
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