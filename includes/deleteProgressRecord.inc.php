<?php
session_start();
include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
    // Retrieve UIN from session or POST request
    $user_uin = $_SESSION['uin']; // or $user_uin = $_POST['uin']; if passed via POST

    // Prepare the SQL statement for deleting from Class_Enrollment
    $sql1 = "DELETE FROM Class_Enrollment WHERE UIN = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("i", $user_uin);
    $stmt1->execute();

    // Prepare the SQL statement for deleting from Cert_Enrollment
    $sql2 = "DELETE FROM Cert_Enrollment WHERE UIN = ?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("i", $user_uin);
    $stmt2->execute();

    // Redirect after successful deletion
    header("Location: ../student.php?update=success");
}
?>
