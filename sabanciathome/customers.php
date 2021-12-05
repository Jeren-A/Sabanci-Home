<?php

include "config.php";
include "header.php";

?>

<?php

$sql_statement = "SELECT * FROM `customer`";
$result = mysqli_query($db, $sql_statement); // Executing query
$customers = array();
while ($row = mysqli_fetch_assoc($result)) { // Fetch and iterate the result
    array_push($customers, $row);
}

?>
<div>
    <h1 class="text-3xl font-bold my-2 w-100 text-center">Customers</h1>
</div>
<div id="container" class="flex">
    <div id="sidebar" class="flex flex-col gap-3 p-3" style="min-width: 15rem;">
        <a href="insertcustomer.php" class="w-full text-center">New customer</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer) : ?>
                <tr>
                    <td><?php echo $customer['user_id']; ?></td>
                    <td><?php echo $customer['display_name']; ?></td>
                    <td><?php echo $customer['email']; ?></td>
                    <td class="text-center">
                        <form action="deletecustomer.php" method="POST">
                            <input type="hidden" value="<?php echo $customer['user_id'] ?>" name="id" />
                            <input type="submit" class="btn btn-danger rounded-full text-xs" value="Delete" />
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>