<?php
include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
    $classID = $_POST['class_ID'];
    $sql1 = "DELETE FROM Class_Enrollment WHERE Class_ID = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("i", $classID);
    $stmt1->execute();
    header("Location: ../student.php?deletion=success");
} else {
    header("Location: ../student.php?error=invalidaccess");
}