<?php
    include_once 'dbh.inc.php';

    $App_Num = $_POST['app_num'];

    $sql =  "DELETE FROM Applications WHERE App_Num = '$App_Num';";
    mysqli_query($conn, $sql);
    header("Location: ../student.php?signup=success");