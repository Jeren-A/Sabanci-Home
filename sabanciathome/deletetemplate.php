<?php

include "config.php";

if(!empty($_POST['identifiercolumn']))
{
    $identifiercolumn = $_POST['identifiercolumn'];
    $sql_statement = "DELETE FROM tablename WHERE identifiercolumn = $identifiercolumn";
    $result = mysqli_query($db, $sql_statement);
    if($result==1){
        echo "İnsert Successful";
    }
}

?>

<!-- YOU HAVE TO PUT THE REST OF THE CODE INTO THE INDEX This is a simple version of delete where the user needs to know the ide to delete it/////////////////
<form action="deletetemplate.php" method="POST"> 
    Identifier of the deleted data: 
    <input type="text" identifiercolumn="identifiercolumn" name="identifiercolumn"> 
    <input type="submit" value="Submit"> 
</form> 

    -->
<!-- This is better version where the user can view and select the row they want to be deleted///////////////
    <?php 

        include "config.php";

    ?>

<form action="deletetemplate.php" method="POST">
<select name="identifiercolumn">

<?php

$sql_command = "SELECT identifiercolumn, column1, column2 FROM tablename";

$myresult = mysqli_query($db, $sql_command);

    while($identifiercolumn_rows = mysqli_fetch_assoc($myresult))
    {
        $identifiercolumn = $identifiercolumn_rows['identifiercolumn'];
        $column1 = $identifiercolumn_rows['column1'];
        $column2 = $identifiercolumn_rows['column2'];
        echo "<option value=$identifiercolumn>". $column1 . " - " . $column2 . "</option>";
    }

?>

</select>
<button>DELETE</button>
</form>
-->