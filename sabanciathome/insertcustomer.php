<?php

include "config.php";
include "header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email'])) {
        $passphrase = $_POST['passphrase'];
        $display_name = $_POST['display_name'];
        $email = $_POST['email'];
        $business_type = $_POST['business_type'];
        $flop_demand = 0;
        $problem_count = 0;
        $sql_statement = "INSERT INTO `customer` (`email`, `passphrase`, `display_name`, `business_type`, `flop_demand`, `problem_count`) VALUES ('$email','$passphrase','$display_name','$business_type','$flop_demand','$problem_count')";
        $result = mysqli_query($db, $sql_statement);
        if ($result) {
            echo "<a href=\"customers.php\">Succesful! Return back</a>";
        }
    } else {
        echo "Failed to reach insert requirement.";
    }
}

?>

<form class="form-control" id="form" action="insertcustomer.php" method="POST">
    email:
    <input type="text" class="form-control" id="email" name="email">
    <br />
    passphrase:
    <input type="password" class="form-control" id="passphrase" name="passphrase">
    <br />
    display_name:
    <input type="text" class="form-control" id="display_name" name="display_name">
    <br />
    business_type:
    <input type="text" class="form-control" id="business_type" name="business_type">
    <br />
    flop_demand:
    <input type="number" class="form-control" id="flop_demand" name="flop_demand">
    <br />
    problem_count:
    <input type="number" class="form-control" id="problem_count" name="problem_count">
    <br />
    <input type="submit" class="btn btn-primary" value="Submit">
</form>