<?php
    include_once 'dbh.inc.php';

    $App_Num = $_POST['app_num'];
    $Program_Num = $_POST['program_num'];
    $UIN = $_POST['uin'];
    $Uncom_Cert = $_POST['uncom_cert'];
    $Com_Cert = $_POST['com_cert'];
    $Purpose_Statement = $_POST['purpose_statement'];

    $sql =  "INSERT INTO Applications (App_Num, Program_Num, UIN, Uncom_Cert, Com_Cert, Purpose_Statement) 
    VALUES ('$App_Num', '$Program_Num', '$UIN', '$Uncom_Cert', '$Com_Cert', '$Purpose_Statement');";
    mysqli_query($conn, $sql);
    header("Location: ../student.php?signup=success");