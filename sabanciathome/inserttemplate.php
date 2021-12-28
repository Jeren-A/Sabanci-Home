<?php 

include "config.php"; 

if (!empty($_POST['requiredcolumn'])){ 
    $columnname1 = $_POST['columnname1']; 
    $columnname2 = $_POST['columnname2']; 
    $columnname3 = $_POST['requiredcolumn']; 
    $sql_statement = "INSERT INTO tablename(columnname1, columnname2, requiredcolumn) VALUES ('$columnname1',$columnname2,$requiredcolumn)"; 

    $result = mysqli_query($db, $sql_statement);
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