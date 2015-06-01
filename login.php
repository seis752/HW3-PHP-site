<?php 
	require_once("functions.php");
	require_once("db-const.php");
	session_start();
	if (logged_in() == true) {
		redirect_to("profile.php");
	}
?>
<html>
<head>
	<title>User Login</title>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
<body>
<div class="login-card">
<h1>Log-in </h1>

<!-- The HTML login form -->
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
		<input type="text" name="user_name" placeholder="Username"/><br />
		<input type="password" name="password" placeholder="Password"/><br />
		<p><input type="checkbox" name="remember" /> remember me<br /></p>

		<input type="submit" name="submit" class="login login-submit" value="Login" />

        <div class="login-help">
            <a href="register.php">Register</a> • <a href="forgot.php">Forgot Password</a>
        </div>
	</form>
</div>
<?php
if (isset($_POST['submit'])) {
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	
	// processing remember me option and setting cookie with long expiry date
	if (isset($_POST['remember'])) {	
		session_set_cookie_params('604800'); //one week (value in seconds)
		session_regenerate_id(true);
	} 

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	# check connection
	if ($mysqli->connect_errno) {
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}
	
	$sql = "SELECT * from users WHERE user_name LIKE '{$user_name}' AND password LIKE '{$password}' LIMIT 1";
	$result = $mysqli->query($sql);
	
	if ($result->num_rows != 1) {
		echo "<p><b>Error:</b> Invalid username/password combination</p>";
	} else {
		// Authenticated, set session variables
		$user = $result->fetch_array();
		$_SESSION['user_id'] = $user['user_id'];
		$_SESSION['user_name'] = $user['user_name'];
		
		// update status to online
		$timestamp = time();
		$sql = "UPDATE users SET status={$timestamp} WHERE user_id={$_SESSION['user_id']}";
		$result = $mysqli->query($sql);
		
		redirect_to("profile.php?id={$_SESSION['user_id']}");
		// do stuffs
	}
}

if(isset($_GET['msg'])) {
	echo "<div style=' text-align:center;'><p style='color:#c6d8e6; font-size: 1.2em;'>" .$_GET['msg']."</p></div>";
}
?>	

</body>
</html>