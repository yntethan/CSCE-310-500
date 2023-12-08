<?php
session_start();
include_once 'dbh.inc.php';

$stmt = $conn->prepare('SELECT * FROM Event');
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display event information as needed
        echo "Event ID: {$row['Event_ID']}, Program Num: {$row['Program_Num']}, Start Date: {$row['Start_Date']}, 
              End Date: {$row['End_Date']}, Location: {$row['Location']}, End Time: {$row['End_Time']}, 
              Event Type: {$row['Event_Type']}<br>";
    }
} else {
    echo "No events found.";
}

$stmt->close();
$conn->close();
?>
