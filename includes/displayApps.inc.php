<?php
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
?>