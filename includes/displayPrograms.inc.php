<?php
include_once 'dbh.inc.php';

$query = "SELECT * FROM Programs";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "<table border='1'>";
    echo "<tr><th>Program Number</th><th>Name</th><th>Description</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['Program_Num']}</td>";
        echo "<td>{$row['Name']}</td>";
        echo "<td>{$row['Description']}</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>