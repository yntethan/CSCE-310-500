<?php
    include_once 'dbh.inc.php';

    $Program_Num = $_POST['program_num'];

    $sql =  "DELETE FROM Programs WHERE Program_Num = '$Program_Num';";
    mysqli_query($conn, $sql);
    header("Location: ../admin.php?signup=success");