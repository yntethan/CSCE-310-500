<?php
session_start();
include_once 'dbh.inc.php'; // Ensure the path is correct

$app_num = isset($_POST['app_num']) ? $_POST['app_num'] : 0;

$stmt = $conn->prepare("SELECT * FROM Document WHERE App_Num = ?");
$stmt->bind_param("i", $app_num);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Uploaded Documents for Application Number: " . htmlspecialchars($app_num) . "</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Document Number</th><th>Link</th><th>Document Type</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['Doc_Num']) . "</td>";
        echo "<td><a href='" . htmlspecialchars($row['Link']) . "' target='_blank'>View Document</a></td>";
        echo "<td>" . htmlspecialchars($row['Doc_Type']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No documents found for Application Number " . htmlspecialchars($app_num) . ".</p>";
}

$stmt->close();
$conn->close();
?>
