<?php

include "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['id'])) {
        $id = $_POST['id'];
        $sql_statement = "DELETE FROM `chunk` WHERE chunk.chunk_id = $id";
        $result = mysqli_query($db, $sql_statement);
        if ($result) {
            echo "<a href=\"/sabanciathome/chunks.php\">Return to Customer</a>";
        }
    }
}
