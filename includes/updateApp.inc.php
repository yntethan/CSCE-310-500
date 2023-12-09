<?php
    // Justin Ma
    session_start();
    include_once 'dbh.inc.php';

    $App_Num = $_POST['app_num'];
    $Program_Num = $_POST['program_num'];
    $UIN = $_POST['uin'];
    $Uncom_Cert = $_POST['uncom_cert'];
    $Com_Cert = $_POST['com_cert'];
    $Purpose_Statement = $_POST['purpose_statement'];

    $sql = "UPDATE Applications
    SET 
        Uncom_Cert = COALESCE(NULLIF('$Uncom_Cert', ''), Uncom_Cert),
        Com_Cert = COALESCE(NULLIF('$Com_Cert', ''), Com_Cert),
        Purpose_Statement = COALESCE(NULLIF('$Purpose_Statement', ''), Purpose_Statement)
    WHERE UIN = $UIN AND 
        App_Num = $App_Num AND 
        Program_Num = $Program_Num;";

    mysqli_query($conn, $sql);
    header("Location: ../student.php?signup=success");