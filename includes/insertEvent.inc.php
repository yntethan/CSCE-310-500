<?php
session_start();
include_once 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $program_num_value = $_POST['program_num_value'];
    $start_date_value = $_POST['start_date_value'];
    $end_date_value = $_POST['end_date_value'];
    $location_value = $_POST['location_value'];
    $end_time_value = $_POST['end_time_value'];
    $event_type_value = $_POST['event_type_value'];

    $stmt = $conn->prepare('INSERT INTO Event (Program_Num, Start_Date, End_Date, Location, End_Time, Event_Type) 
                            VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('ississ', $program_num_value, $start_date_value, $end_date_value, $location_value, $end_time_value, $event_type_value);

    if ($stmt->execute()) {
        header("Location: ../admin.php?insertion=success");
        exit();
    } else {
        header("Location: ../admin.php?error=Error inserting event");
        exit();
    }

    $stmt->close();
} else {
    header("Location: ../admin.php");
    exit();
}
?>
