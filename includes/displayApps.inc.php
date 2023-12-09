<?php
// Justin Ma

include_once 'dbh.inc.php';

$uin = $_SESSION['uin'];
$stmt = $conn->prepare('SELECT * FROM Applications WHERE UIN = ?');
$stmt->bind_param('i', $uin); // Assuming UIN is an integer
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    echo "<table border='1'>";
    echo "<tr><th>Application Number</th><th>Program Number</th><th>UIN</th><th>Uncomplete Certification</th><th>Complete Certification</th><th>Purpose Statement</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>{$row['App_Num']}</td>";
      echo "<td>{$row['Program_Num']}</td>";
      echo "<td>{$row['UIN']}</td>";
      echo "<td>{$row['Uncom_Cert']}</td>";
      echo "<td>{$row['Com_Cert']}</td>";
      echo "<td>{$row['Purpose_Statement']}</td>";
      echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
?>