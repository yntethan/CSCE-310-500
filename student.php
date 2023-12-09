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

<!--Written by Joshua Yan-->
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

<!--Written by Joshua Yan-->
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

<!--Written by Joshua Yan-->
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
    
    <!--Written by Joshua Yan-->
    <h2>Deactivate account</h2>
    <a href="includes/removeStudentAccess.inc.php">Deactivate</a>
    <br>
    <br>

    <h2>Application Information</h2>
    <?php include 'includes/displayApps.inc.php'; ?>
    <br>

    <h2>Submit application</h2>
    <form action="includes/insertApp.inc.php" method="POST">
        <input type="text" name="app_num" placeholder="Application Number">
        <br>
        <input type="text" name="program_num" placeholder="Program Number">
        <br>
        <input type="text" name="uin" placeholder="UIN">
        <br>
        <input type="text" name="uncom_cert" placeholder="Uncomplete Certification">
        <br>
        <input type="text" name="com_cert" placeholder="Complete Certification">
        <br>
        <input type="text" name="purpose_statement" placeholder="Purpose Statement">
        <br>
        <button type="submit" name="submit">Submit Application</button>
    </form>
    <br>

    <h2>Edit application</h2>
    <form action="includes/updateApp.inc.php" method="POST">
        <input type="text" name="app_num" placeholder="Application Number">
        <br>
        <input type="text" name="program_num" placeholder="Program Number">
        <br>
        <input type="text" name="uin" placeholder="UIN">
        <br>
        <input type="text" name="uncom_cert" placeholder="Uncomplete Certification">
        <br>
        <input type="text" name="com_cert" placeholder="Complete Certification">
        <br>
        <input type="text" name="purpose_statement" placeholder="Purpose Statement">
        <br>
        <button type="submit" name="submit">Update Application</button>
    </form>
    <br>

    <h2>Delete application</h2>
    <form action="includes/deleteApp.inc.php" method="POST">
        <input type="text" name="app_num" placeholder="Application Number">
        <br>
        <button type="submit" name="submit">Delete Application</button>
    </form>
    <br>
                   
<h2>Add new progress records</h2>
    <form action="includes/insertProgressRecords.inc.php" method="POST">
        <input type="hidden" name="uin" value="<?php echo isset($_SESSION['uin']) ? $_SESSION['uin'] : ''; ?>">
        <input type="text" name="program_num" placeholder="Program Number">
        <br>
        <input type="text" name="class_id" placeholder="Class ID">
        <br>
        <input type="text" name="cert_id" placeholder="Certification ID">
        <br>
        <input type="text" name="status" placeholder="Status">
        <br>
        <input type="text" name="training_status" placeholder="Training Status">
        <br>
        <input type="text" name="semester" placeholder="Semester">
        <br>
        <input type="text" name="year" placeholder="Year">
        <br>
        <button type="submit" name="submit">Add new progress record</button>
    </form>
    <br>

    <h2>Update progress records</h2>
    <form action="includes/updateProgressRecord.inc.php" method="POST">
        <input type="hidden" name="uin" value="<?php echo isset($_SESSION['uin']) ? $_SESSION['uin'] : ''; ?>">
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

    <h2>View Your Progress Records</h2>
<?php
    $stmtClass = $conn->prepare('SELECT * FROM Class_Enrollment WHERE UIN = ?');
    $stmtClass->bind_param('i', $uin);
    $stmtClass->execute();
    $resultClass = $stmtClass->get_result();
    if ($resultClass->num_rows > 0) {
        echo "<h3>Class Enrollment Records</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Class ID</th><th>Status</th><th>Semester</th><th>Year</th></tr>";
        while($rowClass = $resultClass->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$rowClass['Class_ID']}</td>";
            echo "<td>{$rowClass['Status']}</td>";
            echo "<td>{$rowClass['Semester']}</td>";
            echo "<td>{$rowClass['Year']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No class enrollment records found.";
    }
    $stmtCert = $conn->prepare('SELECT * FROM Cert_Enrollment WHERE UIN = ?');
    $stmtCert->bind_param('i', $uin);
    $stmtCert->execute();
    $resultCert = $stmtCert->get_result();
    if ($resultCert->num_rows > 0) {
        echo "<h3>Certification Enrollment Records</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Certification ID</th><th>Status</th><th>Training Status</th><th>Program Number</th><th>Semester</th><th>Year</th></tr>";
        while($rowCert = $resultCert->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$rowCert['Cert_ID']}</td>";
            echo "<td>{$rowCert['Status']}</td>";
            echo "<td>{$rowCert['Training_Status']}</td>";
            echo "<td>{$rowCert['Program_Num']}</td>";
            echo "<td>{$rowCert['Semester']}</td>";
            echo "<td>{$rowCert['YEAR']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No certification enrollment records found.";
    }
?>
<br>

<h2>Delete Class Enrollment Records</h2>
<form action="includes/deleteSpecificProgressRecordClass.inc.php" method="POST">
    <p>Are you sure you want to delete this progress record?</p>
    <input type="text" name="class_ID" placeholder="class ID">
    <br>
    <button type="submit" name="submit">Delete Record</button>
</form>
<br>

<h2>Delete Certification Enrollment Records</h2>
<form action="includes/deleteSpecificProgressRecordCertification.inc.php" method="POST">
    <p>Are you sure you want to delete this progress record?</p>
    <input type="text" name="prog_num" placeholder="program number">
    <br>
    <button type="submit" name="submit">Delete Record</button>
</form>
<br>

<h2>Delete All Progress Records</h2>
<form action="includes/deleteProgressRecord.inc.php" method="POST">
    <p>Are you sure you want to delete all your progress records?</p>
    <button type="submit" name="submit">Delete All Records</button>
</form>
<br>

<!-- Document Upload and Management -->
<h2>Document Upload</h2>

<!-- done by ethan-->
<!-- a. Insert: Upload resumes and other documents for program opportunities -->
<p>Upload resumes and other documents for program opportunities</p>
<p>Note: Application Number must be an existing application in the database; see above programs table</p>
<form action="includes/uploadDocument.inc.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="doc_num" placeholder="Document Number">
        <br>
        <input type="text" name="app_num" placeholder="Application Number">
        <br>
        <input type="text" name="link" placeholder="Document Link">
        <br>
        <input type="text" name="doc_type" placeholder="Document Type">
        <br>
        <button type="submit" name="submit">Upload Document</button>
</form>
<<<<<<< HEAD

<h2>View Uploaded Documents</h2>
<form action="includes/viewDocs.inc.php" method="POST">
    <input type="text" name="app_num" placeholder="Enter Application Number" required>
    <button type="submit" name="submit">View Documents</button>
</form>

=======
<!-- done by ethan-->
<!-- c. Select: View their uploaded documents -->
<h2>View Uploaded Documents</h2>
<?php
    $stmtDocument = $conn->prepare('SELECT * FROM Document WHERE App_Num = ?');
    $stmtDocument->bind_param('i', $_SESSION['app_num']);
    $stmtDocument->execute();
    $resultDocument = $stmtDocument->get_result();
    if ($resultDocument->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Document Number</th><th>Link</th><th>Document Type</th></tr>";
        while($rowDocument = $resultDocument->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$rowDocument['Doc_Num']}</td>";
            echo "<td>{$rowDocument['Link']}</td>";
            echo "<td>{$rowDocument['Doc_Type']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No documents uploaded.";
    }
?>
<!-- done by ethan-->
>>>>>>> b15d5f0d64193b228485065687739ea6fb805fb7
<!-- d. Delete: Remove a specific document -->
<h2>Delete Document</h2>
<form action="includes/deleteDocument.inc.php" method="POST">
    <p>Enter the Document Number to delete:</p>
    <input type="text" name="doc_num" placeholder="Document Number">
    <br>
    <button type="submit" name="submit">Delete Document</button>
</form>

<!-- done by ethan-->
<h2>Update Document Details</h2>
<form action="includes/updateDocument.inc.php" method="POST">
    <input type="text" name="doc_num" placeholder="Document Number" required>
    <br>
    <input type="text" name="updated_app_num" placeholder="Application Number" required>
    <br>
    <input type="text" name="updated_link" placeholder="Updated Document Link" required>
    <br>
    <input type="text" name="updated_doc_type" placeholder="Updated Document Type" required>
    <br>
    <button type="submit" name="submit">Update Document</button>
</form>


</body>
</html>

