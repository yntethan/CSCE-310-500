<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

//displays session data for debugging
//$_SESSION['test'] = 'Hello, Session!';
//var_dump($_SESSION);

if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>

<?php
session_start();
include_once 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $program_num_value = $_POST['program_num_value'];
    $start_date_value = $_POST['start_date_value'];
    $end_date_value = $_POST['end_date_value'];
    $location_value = $_POST['location_value'];
    $end_time_value = $_POST['end_time_value'];
    $event_type_value = $_POST['event_type_value'];

    $stmt = $conn->prepare('INSERT INTO Event (Program_Num, Start_Date, End_Date, Location, End_Time, Event_Type) 
                            VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('ississ', $program_num_value, $start_date_value, $end_date_value, $location_value, $end_time_value, $event_type_value);

    if ($stmt->execute()) {
        header("Location: ../your_events_page.php?success=Event inserted successfully");
        exit();
    } else {
        header("Location: ../your_events_page.php?error=Error inserting event");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../your_events_page.php");
    exit();
}
?>

<?php
session_start();
include_once 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $target_event_id = $_POST['target_event_id'];
    $updated_program_num = $_POST['updated_program_num'];
    $updated_start_date = $_POST['updated_start_date'];
    $updated_end_date = $_POST['updated_end_date'];
    $updated_location = $_POST['updated_location'];
    $updated_end_time = $_POST['updated_end_time'];
    $updated_event_type = $_POST['updated_event_type'];

    $stmt = $conn->prepare('UPDATE Event SET Program_Num = ?, Start_Date = ?, End_Date = ?, Location = ?, 
                            End_Time = ?, Event_Type = ? WHERE Event_ID = ?');
    $stmt->bind_param('ississsi', $updated_program_num, $updated_start_date, $updated_end_date, $updated_location, 
                      $updated_end_time, $updated_event_type, $target_event_id);

    if ($stmt->execute()) {
        header("Location: ../your_events_page.php?success=Event updated successfully");
        exit();
    } else {
        header("Location: ../your_events_page.php?error=Error updating event");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../your_events_page.php");
    exit();
}
?>

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

<?php
session_start();
include_once 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $target_event_id = $_POST['target_event_id'];

    $stmt = $conn->prepare('DELETE FROM Event WHERE Event_ID = ?');
    $stmt->bind_param('i', $target_event_id);

    if ($stmt->execute()) {
        header("Location: ../your_events_page.php?success=Event deleted successfully");
        exit();
    } else {
        header("Location: ../your_events_page.php?error=Error deleting event");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../your_events_page.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View</title>
</head>
<body>
    <a href="includes/logout.inc.php">Logout</a>
    <h2>System Users</h2>
    <?php include 'includes/displayUsers.inc.php'; ?>
    <br>

    <h2>Add an admin to the system</h2>
    <form action="includes/insertAdmin.inc.php" method="POST">
        <input type="text" name="uin" placeholder="UIN">
        <br>
        <input type="text" name="first" placeholder="First Name">
        <br>
        <input type="text" name="middle" placeholder="Middle Initial">
        <br>
        <input type="text" name="last" placeholder="Last Name">
        <br>
        <input type="text" name="username" placeholder="Username">
        <br>
        <input type="text" name="password" placeholder="Password">
        <br>
        <input type="text" name="email" placeholder="Email">
        <br>
        <input type="text" name="discord" placeholder="Discord Name">
        <br>
        <button type="submit" name="submit">Add new admin</button>
    </form>
    <br>

    <h2>Update information of a user in the system</h2>
    <p>Enter the fields to be updated (other than UIN, only fill out fields to be updated; can leave fields blank if no change)</p>
    <form action="includes/updateUser.inc.php" method="POST">
        <input type="text" name="uin" placeholder="UIN">
        <br>
        <input type="text" name="first" placeholder="First Name">
        <br>
        <input type="text" name="middle" placeholder="Middle Initial">
        <br>
        <input type="text" name="last" placeholder="Last Name">
        <br>
        <input type="text" name="username" placeholder="Username">
        <br>
        <input type="text" name="password" placeholder="Password">
        <br>
        <input type="text" name="type" placeholder="User Type">
        <br>
        <input type="text" name="email" placeholder="Email">
        <br>
        <input type="text" name="discord" placeholder="Discord Name">
        <br>
        <button type="submit" name="submit">Update User</button>
    </form>
    <br>

    <h2>Remove a user's access from the system</h2>
    <form action="includes/removeAccess.inc.php" method="POST">
        <input type="text" name="uin" placeholder="UIN">
        <br>
        <button type="submit" name="submit">Remove access for user</button>
    </form>
    <br>



    <h2>Delete a user from the system</h2>
    <form action="includes/fullDelete.inc.php" method="POST">
        <input type="text" name="uin" placeholder="UIN">
        <br>
        <button type="submit" name="submit">Delete User</button>
    </form>
    

    <h2>Programs</h2>
    <?php include 'includes/displayPrograms.inc.php'; ?>
    <br>

    <h2>Add a new program</h2>
    <form action="includes/insertProgram.inc.php" method="POST">
        <input type="text" name="program_num" placeholder="Program Number">
        <br>
        <input type="text" name="program_name" placeholder="Name">
        <br>
        <input type="text" name="program_desc" placeholder="Description">
        <br>
        <button type="submit" name="submit">Add Program</button>
    </form>
    <br>

    <h2>Update a program</h2>
    <form action="includes/updateProgram.inc.php" method="POST">
        <input type="text" name="program_num" placeholder="Program Number">
        <br>
        <input type="text" name="program_name" placeholder="Name">
        <br>
        <input type="text" name="program_desc" placeholder="Description">
        <br>
        <button type="submit" name="submit">Update Program</button>
    </form>
    <br>

    <h2>Remove access to a program</h2>
    <form action="includes/removeProgramAccess.inc.php" method="POST">
        <input type="text" name="program_num" placeholder="Program Number">
        <br>
        <button type="submit" name="submit">Remove Program Access</button>
    </form>
    <br>

    <h2>Delete a program from the system</h2>
    <form action="includes/deleteProgram.inc.php" method="POST">
        <input type="text" name="program_num" placeholder="Program Number">
        <br>
        <button type="submit" name="submit">Delete Program</button>
    </form>
    <br>

   <h2>Record a student's progress within a program</h2>
    <form action="includes/insertProgressRecord.inc.php" method="POST">
        <input type="text" name="uin" placeholder="UIN">
        <br>
        <input type="text" name="prog_num" placeholder="Program number">
        <br>
        <input type="text" name="class_ID" placeholder="Class ID">
        <br>
        <input type="text" name="cert_ID" placeholder="Cert ID">
        <br>
        <input type="text" name="stat" placeholder="Status">
        <br>
        <input type="text" name="training_stat" placeholder="Training Status">
        <br>
        <input type="text" name="semester" placeholder="Semester">
        <br>
        <input type="text" name="year" placeholder="Year">
        <br>
        <button type="submit" name="submit">Record Student's Progress</button>
    </form>
    <br>

    <h2>Update progress records</h2>
    <form action="includes/updateProgressRecordForAdmin.inc.php" method="POST">
        <input type="text" name="uin" placeholder="UIN">
        <br>
        <input type="text" name="program_num" placeholder="Program Number">
        <br>
        <input type="text" name="class_id" placeholder="Class ID">
        <br>
        <input type="text" name="cert_id" placeholder="Certification ID">
        <br>
        <input type="text" name="new_Status" placeholder="New Status">
        <br>
        <input type="text" name="new_training_status" placeholder="New Training Status">
        <br>
        <button type="submit" name="submit">update progress record</button>
    </form>
    <br>

    <h2>View Student's Progress Records</h2>
    <form action="includes/viewProgressRecords.inc.php" method="POST">
        <input type="text" name="uin" placeholder="Enter Student UIN">
        <button type="submit" name="submit">View Records</button>
    <br>
  
    <h2>Delete Class Enrollment Records</h2>
    <form action="includes/deleteClassAdmin.inc.php" method="POST">
        <p>Are you sure you want to delete this progress record?</p>
        <input type="text" name="UIN" placeholder="UIN">
        <br>
        <input type="text" name="class_ID" placeholder="class ID">
        <br>
        <button type="submit" name="submit">Delete Record</button>
    </form>
    <br>

    <h2>Delete Certification Enrollment Records</h2>
    <form action="includes/deleteCertAdmin.inc.php" method="POST">
        <p>Are you sure you want to delete this progress record?</p>
        <input type="text" name="UIN" placeholder="UIN">
        <br>
        <input type="text" name="prog_num" placeholder="program number">
        <br>
        <button type="submit" name="submit">Delete Record</button>
    </form>
    <br>

    <h2>Create an event for various programs</h2>
    <form action="includes/insertEvent.inc.php" method="POST">
        <input type="text" name="program_num" placeholder="Program Number">
        <br>
        <input type="date" name="start_date" placeholder="Start Date">
        <br>
        <input type="date" name="end_date" placeholder="End Date">
        <br>
        <input type="text" name="location" placeholder="Location">
        <br>
        <input type="time" name="end_time" placeholder="End Time">
        <br>
        <input type="text" name="event_type" placeholder="Event Type">
        <br>
        <button type="submit" name="submit">Create Event</button>
    </form>
    <br>

    <h2>Edit an event's details, including student attendance information</h2>
    <form action="includes/updateEvent.inc.php" method="POST">
        <input type="text" name="event_id" placeholder="Event ID">
        <br>
        <input type="text" name="program_num" placeholder="Program Number">
        <br>
        <input type="date" name="start_date" placeholder="Start Date">
        <br>
        <input type="date" name="end_date" placeholder="End Date">
        <br>
        <input type="text" name="location" placeholder="Location">
        <br>
        <input type="time" name="end_time" placeholder="End Time">
        <br>
        <input type="text" name="event_type" placeholder="Event Type">
        <br>
        <button type="submit" name="submit">Update Event</button>
    </form>
    <br>

    <h2>Retrieve information for each event</h2>
    <?php include 'includes/displayEvents.inc.php'; ?>
    <br>

    <h2>Remove an event</h2>
    <form action="includes/deleteEvent.inc.php" method="POST">
        <input type="text" name="event_id" placeholder="Event ID">
        <br>
        <button type="submit" name="submit">Remove Event</button>
    </form>
    <br>

</body>
</html>