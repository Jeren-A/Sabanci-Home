<?php

include "config.php";
include "header.php";

?>

<a href="problemchunk.php">Add Chunk</a>

<?php
$sql_statement = "SELECT * FROM `chunk`";
$result = mysqli_query($db, $sql_statement); // Executing query
$problemchunks = array();
while ($row = mysqli_fetch_assoc($result)) { // Fetch and iterate the result
    array_push($problemchunks, $row);
}
?>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Problem ID</th>
            <th>Chunk ID</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach ($problemchunks as $problemchunk): ?>
            <tr>
                <td>
                    <form action="$deleteproblemchunks.php" method="POST">
                        <input type="hidden" value="<?php echo $problemchunk['chunk_id'] ?>" name="id" />
                        <input type="submit" class="btn btn-danger" value="X" />
                    </form>
                </td>
                <td><?php echo $chunk['problem_id']; ?></td>
                <td><?php echo $chunk['chunk_id']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
