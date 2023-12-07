<?php
include_once 'dbh.inc.php';

$query = "SELECT * FROM Users";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "<table border='1'>";
    echo "<tr><th>UIN</th><th>First Name</th><th>Middle Initial</th><th>Last Name</th><th>Username</th><th>Password<th>User Type</th><th>Email</th><th>Discord Name</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['UIN']}</td>";
        echo "<td>{$row['First_Name']}</td>";
        echo "<td>{$row['M_Initial']}</td>";
        echo "<td>{$row['Last_Name']}</td>";
        echo "<td>{$row['Username']}</td>";
        echo "<td>{$row['Passwords']}</td>";
        echo "<td>{$row['User_Type']}</td>";
        echo "<td>{$row['Email']}</td>";
        echo "<td>{$row['Discord_Name']}</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
// mysqli_close($conn);
?>