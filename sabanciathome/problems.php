<?php

include "config.php";
include "header.php";

?>

<?php
$sql_statement = "SELECT P.problem_id, P.problem_name, P.weight, C.display_name FROM `problem` P, `customerproblem` CP, `customer` C WHERE P.problem_id = CP.problem_id AND CP.customer_id = C.user_id";

$weight = "All";
if (isset($_GET['weight']) && $_GET['weight'] != "") {
    $weight = $_GET['weight'];
    $sql_statement = $sql_statement . " AND P.weight = '$weight'";
}

$owner = "All";
if (isset($_GET['owner']) && $_GET['owner'] != "") {
    $owner = $_GET['owner'];
    $sql_statement = $sql_statement . " AND C.user_id = '$owner'";
}

$sql_statement = $sql_statement . " ORDER BY P.problem_id";

$result = mysqli_query($db, $sql_statement); // Executing query
$problems = array();
while ($row = mysqli_fetch_assoc($result)) { // Fetch and iterate the result
    array_push($problems, $row);
}

$sql_statement = "SELECT customer.display_name, customer.user_id FROM `customer`";
$result = mysqli_query($db, $sql_statement); // Executing query
$customers = array();
while ($row = mysqli_fetch_assoc($result)) { // Fetch and iterate the result
    array_push($customers, $row);
}

?>
<div>
    <h1 class="text-3xl font-bold my-2 w-100 text-center">Problems</h1>
</div>
<div id="container" class="flex">
    <div id="sidebar" class="flex flex-col gap-3 p-3" style="min-width: 15rem;">
        <a href="insertproblem.php" class="w-full text-center">Create a problem</a>
        <form action="problems.php" method="GET" enctype="application/x-www-form-urlencoded" class="flex gap-3 flex-col">
            <div class="grid grid-cols-2 gap-3">

                <label for="weight">Weight:</label>
                <select id="weight" name="weight" class="rounded-md py-1 px-2 bg-gray-100">
                    <option value="" <?php if ($weight == "All") echo "selected"; ?>>All</option>
                    <option value="Low" <?php if ($weight == "Low") echo "selected"; ?>>Low</option>
                    <option value="Medium" <?php if ($weight == "Medium") echo "selected"; ?>>Medium</option>
                    <option value="High" <?php if ($weight == "High") echo "selected"; ?>>High</option>
                    <option value="Very_High" <?php if ($weight == "Very_High") echo "selected"; ?>>Very High</option>
                </select>

                <label for="owner">Owners:</label>
                <select id="owner" name="owner" class="rounded-md py-1 px-2 bg-gray-100">
                    <option value="" <?php if ($weight == "All") echo "selected"; ?>>All</option>
                    <?php foreach ($customers as $customer) : ?>
                        <option value="<?php echo $customer['user_id'] ?>" <?php if ($owner == $customer['user_id']) echo "selected"; ?>><?php echo $customer['display_name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <a href="problems.php" class="btn btn-secondary">Reset</a>
                <input type="submit" value="Filter" class="btn btn-primary" />
            </div>

        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Problem Name</th>
                <th>Owner</th>
                <th>Problem Weight</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($problems as $problem) : ?>
                <tr>
                    <td><?php echo $problem['problem_id']; ?></td>
                    <td><?php echo $problem['problem_name']; ?></td>
                    <td><?php echo $problem['display_name']; ?></td>
                    <td>
                        <?php if ($problem['weight'] == "Very_High") echo "Very High";
                        else echo $problem['weight']; ?>
                    </td>
                    <td class="text-center">
                        <form action="deleteproblem.php" method="POST">
                            <input type="hidden" value="<?php echo $problem['problem_id'] ?>" name="id" />
                            <input type="submit" class="btn btn-danger rounded-full text-xs" value="Delete" />
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>