<!-- done by ethan-->
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

    $sql = "UPDATE Event
    SET
        UIN = COALESCE(NULLIF('$UIN', ''), UIN),
        Program_Num = COALESCE(NULLIF('$program_num', ''), Program_Num),
        Start_Date = COALESCE(NULLIF('$start_date', ''), Start_Date),
        Start_Time = COALESCE(NULLIF('$start_time', ''), Start_Time),
        Location = COALESCE(NULLIF('$location', ''), Location),
        End_Date = COALESCE(NULLIF('$end_date', ''), End_Date),
        End_Time = COALESCE(NULLIF('$end_time', ''), End_Time),
        Event_Type = COALESCE(NULLIF('$event_type', ''), Event_Type)
    WHERE EVENT_ID = $event_id;";

    mysqli_query($conn, $sql);
    header("Location: ../admin.php?signup=success");
