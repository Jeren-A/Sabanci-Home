<?php 

include "config.php"; 

if (!empty($_POST['sname'])){ 
    $sname = $_POST['sname']; 
    $rating = $_POST['rating']; 
    $age = $_POST['age']; 
    $sql_statement = "INSERT INTO sailors(sname, rating, age) VALUES ('$sname',$rating,$age)"; 

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
} 
else 
{
    echo "You did not enter your name.";
}

?>
