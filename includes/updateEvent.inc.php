<?php
session_start();
include_once 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $target_event_id = $_POST['target_event_id'];
    $updated_program_num = $_POST['updated_program_num'];
    $updated_start_date = $_POST['updated_start_date'];
    $updated_end_date = $_POST['updated_end_date'];
    $updated_location = $_POST['updated_location'];
    $updated_end_time = $_POST['updated_end_time'];
    $updated_event_type = $_POST['updated_event_type'];

    $stmt = $conn->prepare('UPDATE Event SET Program_Num = ?, Start_Date = ?, End_Date = ?, Location = ?, 
                            End_Time = ?, Event_Type = ? WHERE Event_ID = ?');
    $stmt->bind_param('ississsi', $updated_program_num, $updated_start_date, $updated_end_date, $updated_location, 
                      $updated_end_time, $updated_event_type, $target_event_id);

    if ($stmt->execute()) {
        header("Location: ../your_events_page.php?success=Event updated successfully");
        exit();
    } else {
        header("Location: ../your_events_page.php?error=Error updating event");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../your_events_page.php");
    exit();
}
?>
