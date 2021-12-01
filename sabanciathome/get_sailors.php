<?php
    include "config.php"; // Makes mysql connection
    // All variables in config.php are now accessable in this file too
    $sql_statement =
    "SELECT * FROM sailors";
    $result = mysqli_query($db, $sql_statement); // Executing query
    while($row = mysqli_fetch_assoc($result)) { // Fetch and iterate the result
        $sailor_id = $row['sid'];
        $sailor_name = $row['sname'];
        $srating = $row['rating'];
        echo $sailor_id . " " . $sailor_name . " " . $srating . "<br>";
    }
?>