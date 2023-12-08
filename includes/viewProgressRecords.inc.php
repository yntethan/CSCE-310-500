<?php
session_start();
include_once 'dbh.inc.php'; // Ensure this points to your database connection script

if (isset($_POST['submit'])) {
    $uin = $_POST['uin']; // Retrieve UIN from form input

    // Retrieve and Display Class Enrollment records
    $stmtClass = $conn->prepare('SELECT * FROM Class_Enrollment WHERE UIN = ?');
    $stmtClass->bind_param('i', $uin);
    $stmtClass->execute();
    $resultClass = $stmtClass->get_result();

    if ($resultClass->num_rows > 0) {
        echo "<h3>Class Enrollment Records</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Class ID</th><th>Status</th><th>Semester</th><th>Year</th></tr>";
        while($rowClass = $resultClass->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$rowClass['Class_ID']}</td>";
            echo "<td>{$rowClass['Status']}</td>";
            echo "<td>{$rowClass['Semester']}</td>";
            echo "<td>{$rowClass['Year']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No class enrollment records found.";
    }

    // Retrieve and Display Cert Enrollment records
    $stmtCert = $conn->prepare('SELECT * FROM Cert_Enrollment WHERE UIN = ?');
    $stmtCert->bind_param('i', $uin);
    $stmtCert->execute();
    $resultCert = $stmtCert->get_result();

    if ($resultCert->num_rows > 0) {
        echo "<h3>Certification Enrollment Records</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Certification ID</th><th>Status</th><th>Training Status</th><th>Program Number</th><th>Semester</th><th>Year</th></tr>";
        while($rowCert = $resultCert->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$rowCert['Cert_ID']}</td>";
            echo "<td>{$rowCert['Status']}</td>";
            echo "<td>{$rowCert['Training_Status']}</td>";
            echo "<td>{$rowCert['Program_Num']}</td>";
            echo "<td>{$rowCert['Semester']}</td>";
            echo "<td>{$rowCert['YEAR']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No certification enrollment records found.";
    }
} else {
    echo "Please enter a UIN to view records.";
}
?>
