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