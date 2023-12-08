<?php
    session_start();
    include_once 'dbh.inc.php';

    // Retrieve values from session and POST request
    $user_uin = $_POST['uin']; // Assuming UIN is stored in the session
    $program_num = $_POST['program_num'];
    $cert_id = $_POST['cert_id'];
    $new_status = $_POST['new_Status'];
    $new_training_status = $_POST['new_training_status'];

    // Prepare the SQL statement for updating Class_Enrollment
    $sql1 = "UPDATE Class_Enrollment SET Status = ? WHERE UIN = ? AND Class_ID = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("sii", $new_status, $user_uin, $program_num);
    $stmt1->execute();

    // Prepare the SQL statement for updating Cert_Enrollment
    $sql2 = "UPDATE Cert_Enrollment SET Status = ?, Training_Status = ? WHERE UIN = ? AND Program_Num = ? AND Cert_ID = ?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("ssiii", $new_status, $new_training_status, $user_uin, $program_num, $cert_id);
    $stmt2->execute();

    // Redirect after successful update
    header("Location: ../student.php?update=success");
    ?>
