
<!DOCTYPE html>
<html>
<head>
	<title>MAIN PAGE</title>

<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.button2 {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  } /* Blue */

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>


</head>
<body>


<div align="center">
<b>Welcome to the oparation selection menu</b>
<br>
<br>
Here is the our messages in our database: 
<br>
<br>

<form action="insertcustomer.php" method="POST"> 
    email: 
    <input type="text" id="email" name="email"> 
    passphrase: 
    <input type="text" id="passphrase" name="passphrase">
    display_name: 
    <input type="text" id="display_name" name="display_name">
    business_type: 
    <input type="text" id="business_type" name="business_type">
    flop_demand: 
    <input type="number" id="flop_demand" name="flop_demand">
    problem_count: 
    <input type="number" id="problem_count" name="problem_count">

    <input type="submit" value="Submit"> 
</form> 


</div>
</body>
</html>