<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include 'connection.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="workerEdit.css">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST['worker_editbtn'])) {
        $id = $_POST['edit'];
        $query = "SELECT * FROM workers WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);
        foreach ($query_run as $row) {
    ?>
            <form action="insertdeleteupdate.php" method="POST" enctype="multipart/form-data" >
                <input type="hidden" name="editid" value="<?php echo $row['id'] ?>">
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" name="editfname" class="form-control" id="fname" aria-describedby="emailHelp" value="<?php echo $row['firstName']; ?>">
                </div>
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" name="editlname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['lastName']; ?>">
                </div>
                <div class="form-group">
                    <label for="InputEmail1">Email</label>
                    <input type="text" name="editemail" class="form-control" id="InputEmail1" aria-describedby="emailHelp" value="<?php echo $row['email']; ?>">
                </div>
                <div class="form-group">
                    <label for="Location">Location</label>
                    <input type="text" name="editlocation" class="form-control" id="Location" aria-describedby="emailHelp" value="<?php echo $row['locations']; ?>">
                </div>
                <div class="form-group">
                    <label for="Occupation">Occupation</label>
                    <input type="text" name="editoccupation" class="form-control" id="Occupation" aria-describedby="emailHelp" value="<?php echo $row['OCCUPATION']; ?>">
                </div>
                <div class="form-group">
                    <label for="Phone">Phone</label>
                    <input type="text" name="editphone" class="form-control" id="Phone" aria-describedby="emailHelp" value="<?php echo $row['Phone']; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Image</label>
                    <input type="file" name="editWORKERimage" class="form-control-file" id="editWORKERimage">
                    <button type="submit" class="btn btn-primary" name="updatebtn">Submit</button>
                </div>
            </form>

    <?php
        }
    }
    ?>

</body>
<script>

</script>

</html>