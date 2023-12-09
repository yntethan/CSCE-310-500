<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $documentId = $_POST['documentId'];
    $documentName = $_POST['documentName'];
    $documentType = $_POST['documentType'];
    
    // Validate and sanitize input as needed

    $documentContent = file_get_contents($_FILES['documentContent']['tmp_name']);

    $stmt = $conn->prepare('UPDATE Documents SET documentName = ?, documentType = ?, documentContent = ? WHERE documentId = ?');
    $stmt->bind_param('sssi', $documentName, $documentType, $documentContent, $documentId);

    if ($stmt->execute()) {
        echo 'Document updated successfully.';
    } else {
        echo 'Error updating document.';
    }

    $stmt->close();
}
?>

