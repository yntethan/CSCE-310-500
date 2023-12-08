<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $documentName = $_POST['documentName'];
    $documentType = $_POST['documentType'];
    $documentContent = $_POST['documentContent'];

    // Validate and sanitize input as needed

    $stmt = $conn->prepare('INSERT INTO Documents (documentName, documentType, documentContent) VALUES (?, ?, ?)');
    $stmt->bind_param('sss', $documentName, $documentType, $documentContent);

    if ($stmt->execute()) {
        echo 'Document uploaded successfully.';
    } else {
        echo 'Error uploading document.';
    }

    $stmt->close();
    $conn->close();
}
?>
