<?php
    include_once 'dbh.inc.php';

    $UIN = $_POST['uin'];

    $sql =  "UPDATE Users SET User_Type = 'Inactive' WHERE UIN = '$UIN';";
    mysqli_query($conn, $sql);
    header("Location: ../index.php?signup=success");