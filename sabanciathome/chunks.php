<?php

include "config.php";
include "header.php";

?>

<a href="insertchunk.php">Add Chunk</a>

<?php
$sql_statement = "SELECT * FROM `chunk`";
$result = mysqli_query($db, $sql_statement); // Executing query
$chunks = array();
while ($row = mysqli_fetch_assoc($result)) { // Fetch and iterate the result
    array_push($chunks, $row);
}
?>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Weight</th>
            <th>Description</th>
           
        </tr>
    </thead>
    <tbody>
        <?php foreach ($chunks as $chunk): ?>
            <tr>
                <td>
                    <form action="deletechunk.php" method="POST">
                        <input type="hidden" value="<?php echo $chunk['chunk_id'] ?>" name="id" />
                        <input type="submit" class="btn btn-danger" value="X" />
                    </form>
                </td>
                <td><?php echo $chunk['chunk_id']; ?></td>
                <td><?php echo $chunk['weight']; ?></td>
                <td><?php echo $chunk['description']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
