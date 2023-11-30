<?php
    include_once 'dbh.inc.php';

    $UIN = $_POST['uin'];

    $sql =  "DELETE FROM Users WHERE UIN = '$UIN';";
    mysqli_query($conn, $sql);
    header("Location: ../index.php?signup=success");