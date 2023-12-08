<?php
    session_start();
    include_once 'dbh.inc.php';

    $Program_Num = $_POST['program_num'];

    $sql =  "UPDATE Programs SET Description = 'Inactive' WHERE Program_Num = '$Program_Num';";
    mysqli_query($conn, $sql);
    header("Location: ../index.php?signup=success");