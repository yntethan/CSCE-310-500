<?php
include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
    $user_uin = $_POST['UIN'];
    $program_number = $_POST['prog_num'];
    $sql1 = "DELETE FROM Cert_Enrollment WHERE UIN = ? AND Program_Num = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("ii", $user_uin, $program_number);
    $stmt1->execute();
    header("Location: ../admin.php?deletion=success");
} else {
    header("Location: ../admin.php?error=invalidaccess");
}