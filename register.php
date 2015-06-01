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
    <title>User Registration</title>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
<body>

<div class="login-card">
    <h1>Register</h1>

    <!-- The HTML registration form -->
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <input type="text" name="user_name" placeholder="Username"/><br />
        <input type="password" name="password" placeholder="Password"/><br />
        <input type="text" name="user_email" placeholder="Email"/><br />

        <input type="submit" name="submit" class="login login-submit" value="Register" />

        <a href="login.php">I already have an account...</a>

    </form>
</div>

<?php
if (isset($_POST['submit'])) {
## connect mysql server
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	# check connection
	if ($mysqli->connect_errno) {
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}
## query database
	# prepare data for insertion
	$user_name	= $_POST['user_name'];
	$password	= $_POST['password'];
	$user_email		= $_POST['user_email'];

	# check if username and email exist else insert
	// u = username, e = emai, ue = both username and email already exists
	$exists = "";
	$result = $mysqli->query("SELECT user_name from users WHERE user_name = '{$user_name}' LIMIT 1");
	if ($result->num_rows == 1) {
		$exists .= "u";
	}	
	$result = $mysqli->query("SELECT user_email from users WHERE user_email = '{$user_email}' LIMIT 1");
	if ($result->num_rows == 1) {
		$exists .= "e";
	}

	if ($exists == "u") echo "<p><b>Error:</b> Username already exists!</p>";
	else if ($exists == "e") echo "<p><b>Error:</b> Email already exists!</p>";
	else if ($exists == "ue") echo "<p><b>Error:</b> Username and Email already exists!</p>";
	else {
		# insert data into mysql database
		$sql = "INSERT  INTO `users` (`user_id`, `user_name`, `password`, `user_email`)
				VALUES (NULL, '{$user_name}', '{$password}', '{$user_email}')";

		if ($mysqli->query($sql)) {
			redirect_to("login.php?msg=Registred successfully");
		} else {
			echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
			exit();
		}
	}
}
?>	

</body>
</html>