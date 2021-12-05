<?php

include "config.php";
include "header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        $passphrase = $_POST['passphrase'];
        $display_name = $_POST['display_name'];
        $none_profit = 0;
        $for_profit = 0;
        $total_flops = 0;
        $computer_count = 0;
        $sql_statement = "INSERT INTO `donator` (`email`, `passphrase`, `display_name`, `none_profit`, `for_profit`, `total_flops`, `computer_count`) VALUES ('$email','$passphrase','$display_name','$none_profit','$for_profit','$total_flops', '$computer_count')";
        $result = mysqli_query($db, $sql_statement);
        if ($result) {
            echo "<a href=\"donators.php\">Succesful! Return back</a>";
        }
    } else {
        echo "Failed to reach insert requirement.";
    }
}

?>

<form class="form-control" id="form" action="insertdonator.php" method="POST">
    email:
    <input type="text" class="form-control" id="email" name="email">
    <br />
    passphrase:
    <input type="password" class="form-control" id="passphrase" name="passphrase">
    <br />
    display_name:
    <input type="text" class="form-control" id="display_name" name="display_name">
    <br />
    none_profit:
    <input type="number" class="form-control" id="none_profit" name="none_profit">
    <br />
    for_profit:
    <input type="number" class="form-control" id="for_profit" name="for_profit">
    <br />
    total_flops:
    <input type="number" class="form-control" id="total_flops" name="total_flops">
    <br />
    computer_count:
    <input type="number" class="form-control" id="computer_count" name="computer_count">
    <br />
    <input type="submit" class="btn btn-primary" value="Submit">
</form>
