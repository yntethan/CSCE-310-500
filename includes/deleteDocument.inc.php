<?php
    include_once 'dbh.inc.php';

    $Doc_Num = $_POST['doc_num'];

    $sql =  "DELETE FROM Document WHERE Doc_Num = '$Doc_Num';";
    mysqli_query($conn, $sql);
    header("Location: ../student.php?signup=success");
