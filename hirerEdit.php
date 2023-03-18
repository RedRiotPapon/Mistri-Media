<!DOCTYPE html>
<?php
include 'adsecity.php';
include 'connection.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if (isset($_POST['h_deletebtn'])) {
        $id = $_POST['delete_id'];
        $query = "DELETE FROM hirer WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);
        $_SESSION['hDeletion'] = 2;
        header("Location: AdminPannel.php");
        exit();
        
    }
    ?>
</body>
</html>