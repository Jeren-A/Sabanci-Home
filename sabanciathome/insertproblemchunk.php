<?php

include "config.php";
include "header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['chunk_id'])) {
        $chunk_id = $_POST['chunk_id'];
        $problem_id = $_POST['problem_id'];
        $sql_statement = "INSERT INTO `problemchunk` (`problem_id`, `chunk_id`) VALUES ('$problem_id','$chunk_id')";
        $result = mysqli_query($db, $sql_statement);
        if ($result) {
            echo "<a href=\"problemchunks.php\">Succesful! Return back</a>";
        }
    } else {
        echo "Failed to reach insert requirement.";
    }
}

?>

<form class="form-control" id="form" action="insertproblemchunk.php" method="POST">
    weight:
    <input type="number" class="form-control" id="problem_id" name="problem_id">
    <br />
    description:
    <input type="number" class="form-control" id="chunk_id" name="chunk_id">
    <br />
    <input type="submit" class="btn btn-primary" value="Submit">
</form>
