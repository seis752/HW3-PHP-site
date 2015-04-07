<?php
	include_once"settings.php";
	
	if($_SESSION['user']){
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";;
	}
	
	if(isset($_GET['username'])){
		
		$name = $_GET['username'];
		$password = $_GET['password'];
		$sql = "SELECT * FROM users WHERE username = '$name' and password = '$password'";
		
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
			$_SESSION['user'] = $name;
			echo "<meta http-equiv='refresh' content='0;url=index.php'>";;
		}
	}
?>

<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Login Page</title>
</head>

<body>
	<form action="login.php" method="get">
		Username: <input type="text" name="username" id="username" >
		<br>
		Password: <input type="text" name="password" id="password" >
		<br>
		<input type="submit" name="submit" id="submit" >
    </form>
</body>

</html>
