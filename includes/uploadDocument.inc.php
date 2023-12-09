<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $appNum = $_POST['appNum']; // Assuming you have this input in your form
    $link = $_POST['link'];
    $docType = $_POST['docType'];

    // Validate and sanitize input as needed

    $stmt = $conn->prepare('INSERT INTO Document (App_Num, Link, Doc_Type) VALUES (?, ?, ?)');
    $stmt->bind_param('iss', $appNum, $link, $docType); // Assuming App_Num is an integer, adjust 'iss' accordingly

    if ($stmt->execute()) {
        echo 'Document uploaded successfully.';
    } else {
        echo 'Error uploading document.';
    }

    $stmt->close();
    $conn->close();
}
?>
