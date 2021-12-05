<?php

include "config.php";
include "header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['description'])) {
        $desc = $_POST['description'];
        $weight = $_POST['chunk_weight'];
        $problem = $_POST['problem'];

        $new_id = 0;
        $sql_statement = "INSERT INTO `chunk` (`description`, `weight`) VALUES ('$desc','$weight')";
        $result = mysqli_query($db, $sql_statement);
        if ($result) {
            $new_id = mysqli_insert_id($db);

            $sql_statement = "INSERT INTO `problemchunk` (`problem_id`, `chunk_id`) VALUES ('$problem','$new_id')";
            $result = mysqli_query($db, $sql_statement);

            if ($result) {
                echo "<a href=\"chunks.php\">Succesful! Return back</a>";
            }
        }
    } else {
        echo "Failed to reach insert requirement.";
    }
}

$sql_statement = "SELECT problem.problem_id, problem.problem_name FROM `problem`";

$result = mysqli_query($db, $sql_statement); // Executing query
$problems = array();
while ($row = mysqli_fetch_assoc($result)) { // Fetch and iterate the result
    array_push($problems, $row);
}

?>

<body class="w-full">
    <form class="form-control w-96 mx-auto mt-4 p-3" id="form" action="insertchunk.php" method="POST">
        <div class="text-2xl font-light mb-3 w-full flex justify-center">Create a chunk</div>
        <div class="grid grid-cols-2 gap-3">
            <label for="description">
                Description:
            </label>
            <input type="textarea" class="form-control" id="description" name="description">
            <label for="chunk_weight">
                Weight:
            </label>
            <select id="chunk_weight" name="chunk_weight" class="form-control">
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
                <option value="Very_High">Very High</option>
            </select>
            <label for="problem">
                Problem:
            </label>
            <select id="problem" name="problem" class="form-control">
                <?php foreach ($problems as $problem) : ?>
                    <option value="<?php echo $problem['problem_id']; ?>"><?php echo $problem['problem_id']; ?> - <?php echo $problem['problem_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="submit" class="btn btn-primary w-full mt-3" value="Create">
    </form>
</body>