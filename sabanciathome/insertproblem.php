<?php

include "config.php";
include "header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['problem_name'])) {
        $name = $_POST['problem_name'];
        $weight = $_POST['problem_weight'];
        $customer = $_POST['customer'];

        $success = false;

        $new_id = 0;
        $sql_statement = "INSERT INTO `problem` (`problem_name`, `weight`) VALUES ('$name','$weight')";
        $result = mysqli_query($db, $sql_statement);
        if ($result) {
            $new_id = mysqli_insert_id($db);
            
            $sql_statement = "INSERT INTO `customerproblem` (`customer_id`, `problem_id`, `date_posted`) VALUES ('$customer','$new_id', CURRENT_TIME())";
            $result = mysqli_query($db, $sql_statement);

            if ($result) {
                echo "<a href=\"problems.php\">Succesful! Return back</a>";
            }
        }


    } else {
        echo "Failed to reach insert requirement.";
    }
}

$sql_statement = "SELECT customer.user_id, customer.display_name FROM `customer`";

$result = mysqli_query($db, $sql_statement); // Executing query
$customers = array();
while ($row = mysqli_fetch_assoc($result)) { // Fetch and iterate the result
    array_push($customers, $row);
}

?>

<body class="w-full">
    <form class="form-control w-96 mx-auto mt-4 p-3" id="form" action="insertproblem.php" method="POST">
        <div class="text-2xl font-light mb-3 w-full flex justify-center">Create a problem</div>
        <div class="grid grid-cols-2 gap-3">
            <label for="problem_name">
                Problem Name:
            </label>
            <input type="text" class="form-control" id="problem_name" name="problem_name">
            <label for="problem_weight">
                Weight:
            </label>
            <select id="problem_weight" name="problem_weight" class="form-control">
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
                <option value="Very_High">Very High</option>
            </select>
            <label for="customer">
                Customer:
            </label>
            <select id="customer" name="customer" class="form-control">
            <?php foreach ($customers as $customer) : ?>
                <option value="<?php echo $customer['user_id']; ?>"><?php echo $customer['display_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="submit" class="btn btn-primary w-full mt-3" value="Create">
    </form>
</body>