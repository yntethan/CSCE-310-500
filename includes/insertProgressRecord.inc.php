<?php
include_once 'dbh.inc.php';

$user_uin = $_POST['uin'];
$prog_num = $_POST['prog_num'];
$class_ID = $_POST['class_ID'];
$cert_ID = $_POST['cert_ID'];
$stat = $_POST['stat'];
$training_stat = $_POST['training_stat'];
$semester = $_POST['semester'];
$year = $_POST['year'];
$sql1 = "INSERT INTO Class_Enrollment (UIN, Class_ID, Status, Semester, Year) VALUES (?, ?, ?, ?, ?)";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("iisss", $user_uin, $class_ID, $stat, $semester, $year);
$stmt1->execute();
$sql2 = "INSERT INTO Cert_Enrollment (UIN, Cert_ID, Status, Training_Status, Program_Num, Semester, YEAR) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("iissssi", $user_uin, $cert_ID, $stat, $training_stat, $prog_num, $semester, $year);
$stmt2->execute();
header("Location: ../admin.php?signup=success");
?>
