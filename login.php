<?php
include once ('settings.php');
if($_SESSION['user']){
	header("Location:index.php");
}
if(isset($_POST['username'])){
	$name=$_POST['username'];
	$password=$_POST['password'];
	$sql ="SELECT * FROM users WHERE username='$name' and password='$password' limit 1"; 
	$result=mysql_query($sql);
	while($row = mysql_fetch_array($result)
	{
		$_SESSSION['user'] = $name;
		header("Location:index.php");
	}
}
?>
<!DOCTYPE html> 
<html>
<head>
<title>Login Page</title> 
</head>  
<body> 
<h1>Login<br></h1> 
<form action="login.php" method="POST">  
	Username: <input type="text" name="username" id="username"/><br/>  
	Password: <input type="password" name="password" id="password"/><br />  
		<input type="submit" value="Submit"/>  
</form>  
</body> 
</html> 
