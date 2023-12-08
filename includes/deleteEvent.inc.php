<?php
session_start();
include_once 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $target_event_id = $_POST['target_event_id'];

    $stmt = $conn->prepare('DELETE FROM Event WHERE Event_ID = ?');
    $stmt->bind_param('i', $target_event_id);

    if ($stmt->execute()) {
        header("Location: ../your_events_page.php?success=Event deleted successfully");
        exit();
    } else {
        header("Location: ../your_events_page.php?error=Error deleting event");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../your_events_page.php");
    exit();
}
?>
