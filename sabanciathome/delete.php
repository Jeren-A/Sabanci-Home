<?php

include "config.php";

if(!empty($_POST['ids']))
{
    $bid = $_POST['ids'];
    $sql_statement = "DELETE FROM boats WHERE bid = $bid";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
}

?>