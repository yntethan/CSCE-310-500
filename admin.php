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
    <br>
    

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



</body>
</html>