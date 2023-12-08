<?php
    include_once 'dbh.inc.php';
    $UIN = $_POST['uin'];
    $progNum = $_POST['program_num'];
    $classID = $_POST['class_id'];
    $certID = $_POST['cert_id'];
    $stat = $_POST['status'];
    $trainingStat = $_POST['training_status'];
    $semester = $_POST['semester'];
    $whatYear = $_POST['year'];
    $sql1 = "INSERT INTO Class_Enrollment (UIN, Class_ID, Status, Semester, Year) VALUES (?, ?, ?, ?, ?)";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("iisss", $UIN, $classID, $stat, $semester, $whatYear);
    $stmt1->execute();
    $sql2 = "INSERT INTO Cert_Enrollment (UIN, Cert_ID, Status, Training_Status, Program_Num, Semester, YEAR) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("iissssi", $UIN, $certID, $stat, $trainingStat, $progNum, $semester, $whatYear);
    $stmt2->execute();
    header("Location: ../index.php?signup=success");
    ?>
