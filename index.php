<?php
	include_once("loggedin.php");
?>

<!DOCTYPE html>
<head>
	<title>Simple Form</title>
</head>
<html>
<body>
<h1>SEIS752 Advanced Web Application Development<br />
  Simple Forms
</h1>
<form action="/x/y/z" method="POST"> 
    Value1: <input type="text" name="value1"/><br /> 
    Value2: <input type="text" name="value2" value="47"/><br /> 
    <input type="submit" value="Submit"/> 
</form> 

<a href="logout.php">Logout</a>
<a href="search.php">Search</a>
</body>
</html>
