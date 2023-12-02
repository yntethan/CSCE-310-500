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
    <title>Student View</title>
</head>
<body>
<a href="includes/logout.inc.php">Logout</a>
<h2>User Information</h2>
<?php
  include_once 'includes/dbh.inc.php';
  $uin = $_SESSION['uin'];
  $stmt = $conn->prepare('SELECT * FROM Users WHERE UIN = ?');
  $stmt->bind_param('i', $uin); // Assuming UIN is an integer
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if a row is returned
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "<table border='1'>";
      echo "<tr><th>UIN</th><th>First Name</th><th>Middle Initial</th><th>Last Name</th><th>Username</th><th>Password<th>User Type</th><th>Email</th><th>Discord Name</th></tr>";
      // Display user information
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
      echo "</table>";

      $result->close();
      $stmt->close();
  }
?>
<br>

<h2>Update Account Information</h2>
<form action="includes/updateStudent.inc.php" method="POST">
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
        <button type="submit" name="submit">Update Information</button>
    </form>

<h2>Create New Account</h2>
    <form action="includes/insertStudent.inc.php" method="POST">
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
        <button type="submit" name="submit">Add new account</button>
    </form>
    <br>

    <h2>Deactivate account</h2>
    <a href="includes/removeStudentAccess.inc.php">Deactivate</a>


</body>
</html>

