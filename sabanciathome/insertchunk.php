<?php

include "config.php";
include "header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['weight'])) {
        $weight = $_POST['weight'];
        $description = $_POST['description'];
        $sql_statement = "INSERT INTO `chunk` (`weight`, `description`) VALUES ('$weight','$description')";
        $result = mysqli_query($db, $sql_statement);
        if ($result) {
            echo "<a href=\"chunks.php\">Succesful! Return back</a>";
        }
    } else {
        echo "Failed to reach insert requirement.";
    }
}

?>

<form class="form-control" id="form" action="insertchunk.php" method="POST">
    weight:
    <input type="text" class="form-control" id="weight" name="weight">
    <br />
    description:
    <input type="text" class="form-control" id="description" name="description">
    <br />
    <input type="submit" class="btn btn-primary" value="Submit">
</form>
