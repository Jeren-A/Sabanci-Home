<?php

include "config.php";
include "header.php";
?>

<?php
$sql_statement = "SELECT C.chunk_id, P.problem_name, C.description, C.weight FROM `chunk` C, `problemchunk` PC, `problem` P WHERE C.chunk_id = PC.chunk_id AND P.problem_id = PC.problem_id";

$weight = "All";
if (isset($_GET['weight']) && $_GET['weight'] != "") {
    $weight = $_GET['weight'];
    $sql_statement = $sql_statement . " AND C.weight = '$weight'";
}

$sql_statement = $sql_statement . " ORDER BY C.chunk_id";

$result = mysqli_query($db, $sql_statement); // Executing query
$chunks = array();
while ($row = mysqli_fetch_assoc($result)) { // Fetch and iterate the result
    array_push($chunks, $row);
}

?>
<div>
    <h1 class="text-3xl font-bold my-2 w-100 text-center">Chunks</h1>
</div>
<div id="container" class="flex">
    <div id="sidebar" class="flex flex-col gap-3 p-3" style="min-width: 15rem;">
        <a href="insertchunk.php" class="w-full text-center">Create a chunk</a>
        <form action="chunks.php" method="GET" enctype="application/x-www-form-urlencoded" class="flex gap-3 flex-col">
            <div class="grid grid-cols-2 gap-3">

                <label for="weight">Weight:</label>
                <select id="weight" name="weight" class="rounded-md py-1 px-2 bg-gray-100">
                    <option value="" <?php if ($weight == "All") echo "selected"; ?>>All</option>
                    <option value="Low" <?php if ($weight == "Low") echo "selected"; ?>>Low</option>
                    <option value="Medium" <?php if ($weight == "Medium") echo "selected"; ?>>Medium</option>
                    <option value="High" <?php if ($weight == "High") echo "selected"; ?>>High</option>
                    <option value="Very_High" <?php if ($weight == "Very_High") echo "selected"; ?>>Very High</option>
                </select>
                <a href="chunks.php" class="btn btn-secondary">Reset</a>
                <input type="submit" value="Filter" class="btn btn-primary" />
            </div>

        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Problem Name</th>
                <th>Chunk Description</th>
                <th>Chunk Weight</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($chunks as $chunk) : ?>
                <tr>
                    <td><?php echo $chunk['chunk_id']; ?></td>
                    <td><?php echo $chunk['problem_name']; ?></td>
                    <td><?php echo $chunk['description']; ?></td>
                    <td>
                        <?php if ($chunk['weight'] == "Very_High") echo "Very High";
                        else echo $chunk['weight']; ?>
                    </td>
                    <td class="text-center">
                        <form action="deletechunk.php" method="POST">
                            <input type="hidden" value="<?php echo $chunk['chunk_id'] ?>" name="id" />
                            <input type="submit" class="btn btn-danger rounded-full text-xs" value="Delete" />
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>