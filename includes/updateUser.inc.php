<?php
    include_once 'dbh.inc.php';

    $UIN = $_POST['uin'];
    $first = $_POST['first'];
    $mi = $_POST['middle'];
    $last = $_POST['last'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    $email = $_POST['email'];
    $discord = $_POST['discord'];

    $sql = "UPDATE Users
    SET
        First_Name = COALESCE(NULLIF('$first', ''), First_Name),
        M_Initial = COALESCE(NULLIF('$mi', ''), M_Initial),
        Last_Name = COALESCE(NULLIF('$last', ''), Last_Name),
        Username = COALESCE(NULLIF('$username', ''), Username),
        Passwords = COALESCE(NULLIF('$password', ''), Passwords),
        User_Type = COALESCE(NULLIF('$type', ''), User_Type),
        Email = COALESCE(NULLIF('$email', ''), Email),
        Discord_Name = COALESCE(NULLIF('$discord', ''), Discord_Name)
    WHERE UIN = $UIN;";

    mysqli_query($conn, $sql);
    header("Location: ../index.php?signup=success");