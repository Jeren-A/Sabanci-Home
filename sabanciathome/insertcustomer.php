<?php 

include "config.php"; 

if (!empty($_POST['email'])){ 
    $user_id= $_POST['user_id'];
    $passphrase = $_POST['passphrase']; 
    $display_name = $_POST['display_name']; 
    $email = $_POST['email']; 
    $business_type = $_POST['business_type']; 
    $flop_demand = $_POST['flop_demand']; 
    $problem_count = $_POST['problem_count']; 
    $sql_statement = "INSERT INTO `customer` (`user_id`, `email`, `passphrase`, `display_name`, `business_type`, `flop_demand`, `problem_count`) VALUES ('$user_id', '$email','$passphrase','$display_name','$business_type','$flop_demand','$problem_count')"; 
    //echo $sql_statement;
    $result = mysqli_query($db, $sql_statement);
    //echo $result;
    if($result){
        echo "Insert Successful";
    }
} 
else 
{
    echo "Failed to reach insert requirement.";
}


?>
<!-- this is the from you can add to the main page (INDEX) for this insert
<form action="inserttemplate.php" method="POST"> 
    First Column: 
    <input type="text" id="columnname" name="columnname"> 
    Second Column: 
    <input type="text" id="columnname" name="columnname">
    Third Column: <input type="text" id="columnname" name="column name">
    <input type="submit" value="Submit"> 
</form> 
-->