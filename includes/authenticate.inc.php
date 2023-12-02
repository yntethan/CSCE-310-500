<?php
    session_start();
    include_once 'dbh.inc.php';
    
    if ( !isset($_POST['username'], $_POST['password']) ) {
        // Could not get the data that should have been sent.
        exit('Please fill both the username and password fields!');
    }

    if ($stmt = $conn->prepare('SELECT UIN, Passwords, User_Type FROM Users WHERE username = ?')) {

        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($UIN, $password, $userType);
            $stmt->fetch();
            // Account exists, now we verify the password.
            // Note: remember to use password_hash in your registration file to store the hashed passwords.
            if ($_POST['password'] === $password) {
                // Verification success! User has logged-in!
                // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                session_regenerate_id();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['uin'] = $UIN;
                $_SESSION['userType'] = $userType;
                var_dump($_SESSION);

                //code for handling logins for admins
                //header('Location: ../admin.php');

                //code for handling logins for different user types
                if ($_SESSION['userType'] === 'Admin') {
                    header('Location: ../admin.php');
                } elseif ($_SESSION['userType'] === 'Student') {
                    header('Location: ../student.php');
                } else {
                    // Redirect to a default page if User_Type is neither admin nor student.
                    header('Location: ../index.php');
                }

                exit();
            } else {
                // Incorrect password
                echo 'Incorrect username and/or password!';
            }
        } else {
            // Incorrect username
            echo 'Incorrect username and/or password!';
        }
    
        $stmt->close();
    }