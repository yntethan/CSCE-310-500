<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    include_once 'dbh.inc.php'; // Database connection

    $doc_num = $_POST['doc_num'];
    $updated_app_num = $_POST['updated_app_num'];
    $updated_link = $_POST['updated_link'];
    $updated_doc_type = $_POST['updated_doc_type'];

    $stmt = $conn->prepare("UPDATE Document SET App_Num = ?, Link = ?, Doc_Type = ? WHERE Doc_Num = ?");
    $stmt->bind_param("issi", $updated_app_num, $updated_link, $updated_doc_type, $doc_num);

    if ($stmt->execute()) {
        echo "Document updated successfully.";
        // Redirect or perform other actions
    } else {
        echo "Error updating document: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../student.php"); // Redirect to a different page if not accessed via form submission
    exit();
}
?>
