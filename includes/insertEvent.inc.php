<?php
    session_start();
    include_once 'dbh.inc.php';

    $event_id = $_POST['event_id'];
    $program_num = $_POST['program_num'];
    $UIN = $_SESSION['uin'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $location = $_POST['location'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $event_type = $_POST['event_type'];

    $sql =  "INSERT INTO Event (EVENT_ID, UIN, Program_Num, Start_Date, Start_Time, Location, End_Date, End_Time, Event_Type)
    VALUES ('$event_id', '$UIN', '$program_num', '$start_date', '$start_time', '$location', '$end_date', '$end_time', '$event_type');";
    mysqli_query($conn, $sql);
    header("Location: ../admin.php?signup=success");
