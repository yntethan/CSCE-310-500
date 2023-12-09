<!-- done by ethan-->
<?php
    include_once 'dbh.inc.php';

    $Event_ID = $_POST['event_id'];

    $sql =  "DELETE FROM Event WHERE Event_ID = '$Event_ID';";
    mysqli_query($conn, $sql);
    header("Location: ../admin.php?signup=success");
