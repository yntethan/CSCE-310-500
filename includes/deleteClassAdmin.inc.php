<?php
include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
    $user_uin = $_POST['UIN'];
    $classID = $_POST['class_ID'];
    $sql1 = "DELETE FROM Class_Enrollment WHERE UIN = ? AND Class_ID = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("ii", $user_uin, $classID);
    $stmt1->execute();
    header("Location: ../admin.php?deletion=success");
} else {
    header("Location: ../admin.php?error=invalidaccess");
}