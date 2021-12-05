<?php

include "config.php";
include "header.php";

?>

<a href="insertdonator.php">Add Donator</a>

<?php
$sql_statement = "SELECT * FROM `donator`";
$result = mysqli_query($db, $sql_statement); // Executing query
$donators = array();
while ($row = mysqli_fetch_assoc($result)) { // Fetch and iterate the result
    array_push($donators, $row);
}
?>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Email</th>
            <th>Passphrase</th>
            <th>Display Name</th>
            <th>None Profit</th>
            <th>For Profit</th>
            <th>Total Flops</th>
            <th>Computer Count</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($donators as $donator): ?>
            <tr>
                <td>
                    <form action="deletecustomer.php" method="POST">
                        <input type="hidden" value="<?php echo $customer['user_id'] ?>" name="id" />
                        <input type="submit" class="btn btn-danger" value="X" />
                    </form>
                </td>
                <td><?php echo $donator['user_id']; ?></td>
                <td><?php echo $donator['email']; ?></td>
                <td><?php echo $donator['passphrase']; ?></td>
                <td><?php echo $donator['display_name']; ?></td>
                <td><?php echo $donator['none_profit']; ?></td>
                <td><?php echo $donator['for_profit']; ?></td>
                <td><?php echo $donator['total_flops']; ?></td>
                <td><?php echo $donator['computer_count']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
