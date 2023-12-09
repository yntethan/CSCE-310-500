<?php
session_start();
include_once 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $target_event_id = $_POST['target_event_id'];

    $stmt = $conn->prepare('DELETE FROM Event WHERE Event_ID = ?');
    $stmt->bind_param('i', $target_event_id);

    if ($stmt->execute()) {
        header("Location: ../admin.php?deletion=success");
        exit();
    } else {
        header("Location: ../admin.php?error");
        exit();
    }

    $stmt->close();
} else {
    header("Location: ../admin.php");
    exit();
}
?>
