<?php

include "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['id'])) {
        $id = $_POST['id'];
        $sql_statement = "DELETE FROM `problemchunk` WHERE problemchunk.chunk_id = $id";
        echo $sql_statement;
        $result = mysqli_query($db, $sql_statement);
        echo $result;
        if ($result) {
            echo "<a href=\"/sabanciathome/problemchunks.php\">Return to Customer</a>";
        }
    }
}
