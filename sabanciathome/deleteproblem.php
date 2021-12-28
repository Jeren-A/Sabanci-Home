<?php

include "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['id'])) {
        $id = $_POST['id'];
        try {
            $db->begin_transaction();
            
            $db->query("DELETE FROM chunk WHERE chunk.chunk_id IN (SELECT problemchunk.chunk_id FROM problemchunk WHERE problemchunk.problem_id = $id)");
            $db->query("DELETE FROM problem WHERE problem.problem_id = $id");

            $db->commit();

            $result = true;
        } catch (Throwable $e) {
            $db->rollback();
            $result = false;
        }
        if ($result) {
            echo "<a href=\"/sabanciathome/problems.php\">Return to Problem</a>";
        }
    }
}
