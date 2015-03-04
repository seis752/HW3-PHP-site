<!DOCTYPE html>
<?php 
include checklogin.php
include navbar.php
include login.php 
?>
<head>
	<title>Login Page</title>
</head>

<body>
<h1>SEIS752 Advanced Web Application Development<br />
  Login
</h1>
<form name="login" method="post" action="login.php">
    Username: <input type="text" name="user"/><br /> 
    Password: <input type="text" name="pass" /><br />
	Remember Me: <input type="checkbox" name="rememberme" value="1"><br>
    <input type="submit" name="submit" value="Login">
</form> 

</body>

</html>
