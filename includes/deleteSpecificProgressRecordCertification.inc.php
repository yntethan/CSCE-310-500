<?php
include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
    $program_number = $_POST['prog_num'];
    $sql1 = "DELETE FROM Cert_Enrollment WHERE Program_Num = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("i", $program_number);
    $stmt1->execute();
    header("Location: ../student.php?deletion=success");
} else {
    header("Location: ../student.php?error=invalidaccess");
}