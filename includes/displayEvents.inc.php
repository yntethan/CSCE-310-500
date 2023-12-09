<?php
include_once 'dbh.inc.php';

$query = "SELECT * FROM Event";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "<table border='1'>";
    echo "<tr><th>Event ID</th><th>UIN</th><th>Program Number</th><th>Start Date</th><th>Start Time</th><th>Location</th><th>End Date</th><th>End Time</th><th>Event Type</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['Event_ID']) . "</td>";
        echo "<td>" . htmlspecialchars($row['UIN']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Program_Num']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Start_Date']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Start_Time']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Location']) . "</td>";
        echo "<td>" . htmlspecialchars($row['End_Date']) . "</td>";
        echo "<td>" . htmlspecialchars($row['End_Time']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Event_Type']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Error: " . mysqli_error($conn);
}

?>
