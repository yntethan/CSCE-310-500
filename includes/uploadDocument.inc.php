<!-- done by ethan-->
<?php
    session_start();
    include_once 'dbh.inc.php';

    $doc_num = $_POST['doc_num'];
    $app_num = $_POST['app_num'];
    $link = $_POST['link'];
    $doc_type = $_POST['doc_type'];

    $sql =  "INSERT INTO Document (Doc_Num, App_Num, Link, Doc_Type)
    VALUES ('$doc_num','$app_num','$link','$doc_type');";
    mysqli_query($conn, $sql);
    header("Location: ../student.php?signup=success");

