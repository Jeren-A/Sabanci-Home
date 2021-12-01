<?php 

include "config.php";

?>

<form action="delete.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT bid, bname, color FROM boats";

$myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $bid = $id_rows['bid'];
        $bname = $id_rows['bname'];
        $color = $id_rows['color'];
        echo "<option value=$bid>". $bname . " - " . $color . "</option>";
    }

?>

</select>
<button>DELETE</button>
</form>