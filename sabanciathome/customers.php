<?php

include "config.php";
include "header.php";

?>

<a href="insertcustomer.php">Add customer</a>

<?php
$sql_statement = "SELECT * FROM `customer`";
$result = mysqli_query($db, $sql_statement); // Executing query
$customers = array();
while ($row = mysqli_fetch_assoc($result)) { // Fetch and iterate the result
    array_push($customers, $row);
}
?>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td>
                    <form action="deletecustomer.php" method="POST">
                        <input type="hidden" value="<?php echo $customer['user_id'] ?>" name="id" />
                        <input type="submit" class="btn btn-danger" value="X" />
                    </form>
                </td>
                <td><?php echo $customer['user_id']; ?></td>
                <td><?php echo $customer['display_name']; ?></td>
                <td><?php echo $customer['email']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>