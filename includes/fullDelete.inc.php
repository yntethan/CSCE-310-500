<?php
    include_once 'dbh.inc.php';

    $UIN = $_POST['uin'];

    $sql =  "DELETE FROM Users WHERE UIN = '$UIN';";
    mysqli_query($conn, $sql);
    header("Location: ../admin.php?signup=success");