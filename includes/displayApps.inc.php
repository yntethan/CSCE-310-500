<!-- <?php
  include_once 'includes/dbh.inc.php';
  $uin = $_SESSION['uin'];
  $stmt = $conn->prepare('SELECT * FROM Applications WHERE UIN = ?');
  $stmt->bind_param('i', $uin); // Assuming UIN is an integer
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if a row is returned
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "<table border='1'>";
      echo "<tr><th>App_Num</th><th>Program_Num</th><th>UIN</th><th>Uncomplete Certificate</th><th>Complete Certificate</th><th>Purpose Statement</th></tr>";
      // Display user information
      echo "<tr>";
      echo "<td>{$row['App_Num']}</td>";
      echo "<td>{$row['Program_Num']}</td>";
      echo "<td>{$row['UIN']}</td>";
      echo "<td>{$row['Uncom_Cert']}</td>";
      echo "<td>{$row['Com_Cert']}</td>";
      echo "<td>{$row['Purpose_Statement']}</td>";
      echo "</tr>";
      echo "</table>";

      $result->close();
      $stmt->close();
  }
?> -->

<?php
include_once 'dbh.inc.php';

$uin = $_SESSION['uin'];
$stmt = $conn->prepare('SELECT * FROM Applications WHERE UIN = ?');
$stmt->bind_param('i', $uin); // Assuming UIN is an integer
$stmt->execute();
$result = $stmt->get_result();

// $query = "SELECT * FROM Applications";
// $result = mysqli_query($conn, $query);

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