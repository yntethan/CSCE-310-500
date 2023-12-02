<?php
    include_once 'dbh.inc.php';

    $UIN = $_POST['uin'];
    $first = $_POST['first'];
    $mi = $_POST['middle'];
    $last = $_POST['last'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $discord = $_POST['discord'];

    $sql =  "INSERT INTO Users (UIN, First_Name, M_Initial, Last_Name, Username, Passwords, User_Type, Email, Discord_Name)
    VALUES ('$UIN', '$first', '$mi', '$last', '$username', '$password', 'Admin', '$email', '$discord');";
    mysqli_query($conn, $sql);
    header("Location: ../admin.php?signup=success");