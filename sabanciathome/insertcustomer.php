<?php

include "config.php";
include "header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email'])) {
        $passphrase = $_POST['passphrase'];
        $display_name = $_POST['display_name'];
        $email = $_POST['email'];
        $business_type = $_POST['business_type'];
        $sql_statement = "INSERT INTO `customer` (`email`, `passphrase`, `display_name`, `business_type`) VALUES ('$email','$passphrase','$display_name','$business_type')";
        $result = mysqli_query($db, $sql_statement);
        if ($result) {
            echo "<a href=\"customers.php\">Succesful! Return back</a>";
        }
    } else {
        echo "Failed to reach insert requirement.";
    }
}

?>

<body class="w-full">

    <form class="form-control w-96 mx-auto mt-4 p-3" id="form" action="insertcustomer.php" method="POST">
        <div class="text-2xl font-light mb-3 w-full flex justify-center">New customer</div>
        <div class="grid grid-cols-2 gap-3">
            <label for="display_name">Full name</label>
            <input type="text" class="form-control" id="display_name" name="display_name">

            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email">

            <label for="passphrase">Password</label>
            <input type="password" class="form-control" id="passphrase" name="passphrase" autocomplete="new-password">
            
            <label for="business_type">Business Type:</label>
            <select name="business_type" id="business_type">
                <option>For profit</option>
                <option>Non-profit</option>
                <option>Other</option>
            </select>
        </div>
        <input type="submit" class="btn btn-primary w-full mt-3" value="Create">
    </form>
    </form>
</body>