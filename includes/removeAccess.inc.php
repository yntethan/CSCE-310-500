<!--Written by Joshua Yan-->
<?php
    include_once 'dbh.inc.php';

    $UIN = $_POST['uin'];

    $sql =  "UPDATE Users SET User_Type = 'Inactive' WHERE UIN = '$UIN';";
    mysqli_query($conn, $sql);
    header("Location: ../admin.php?signup=success");