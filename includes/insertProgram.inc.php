<?php
    include_once 'dbh.inc.php';

    $Program_Num = $_POST['program_num'];
    $Program_Name = $_POST['program_name'];
    $Program_Desc = $_POST['program_desc'];

    $sql = "INSERT INTO Programs (Program_Num, Name, Description)
    VALUES ('$Program_Num', '$Program_Name', '$Program_Desc');";
    mysqli_query($conn, $sql);
    header("Location: ../admin.php?signup=success");
