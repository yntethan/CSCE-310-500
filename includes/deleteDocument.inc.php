<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $documentId = $_POST['documentId'];

    $stmt = $conn->prepare('DELETE FROM Documents WHERE documentId = ?');
    $stmt->bind_param('i', $documentId);

    if ($stmt->execute()) {
        echo 'Document deleted successfully.';
    } else {
        echo 'Error deleting document.';
    }

    $stmt->close();
    $conn->close();
}
?>
