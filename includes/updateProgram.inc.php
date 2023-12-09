<?php
    // Justin Ma
    include_once 'dbh.inc.php';

    $Program_Num = $_POST['program_num'];
    $Program_Name = $_POST['program_name'];
    $Program_Desc = $_POST['program_desc'];

    $sql = "UPDATE Programs
    SET
        Name = COALESCE(NULLIF('$Program_Name', ''), Name),
        Description = COALESCE(NULLIF('$Program_Desc', ''), Description)
    WHERE Program_Num = $Program_Num;";

    mysqli_query($conn, $sql);
    header("Location: ../admin.php?signup=success");