<!DOCTYPE html>
<html lang="en">
<?php
include 'connection.php';
include 'security.php';

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    if (isset($_POST['updatebtn'])) {
        $id = $_POST['editid'];
        $fname = $_POST['editfname'];
        $lname = $_POST['editlname'];
        $email = $_POST['editemail'];
        $loc = $_POST['editlocation'];
        $phone = $_POST['editphone'];
        $occupation = $_POST['editoccupation'];
        $img = $_FILES['editWORKERimage']['name'];

        $sql = "UPDATE workers set firstName ='$fname', lastName ='$lname', email='$email',locations ='$loc', Phone = '$phone' ,
            OCCUPATION = '$occupation',Images = '$img' WHERE id='$id' ";
           $query_run = mysqli_query($conn, $sql);
        if ($query_run) {

            move_uploaded_file($_FILES["editWORKERimage"]["tmp_name"], "upload/".$_FILES["editWORKERimage"]["name"]);
            $_SESSION['success'] = "List Updated";
            $_SESSION['Update'] = 2;
            header("Location: AdminPannel.php");
            exit();
        } else {
            $_SESSION['status'] = 'Not Updated';
            header("Location : AdminPannel.php ");
        }
    }

    if (isset($_POST['worker_deletebtn'])) {
        $id = $_POST['delete_id'];
        $query = "DELETE FROM workers WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);
        $_SESSION['Deletion'] = 2;
        header("Location: AdminPannel.php");
        exit();
        
    }
    ?>










    ?>
</body>

</html>