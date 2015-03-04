<?php
while ($row = mysql_fetch_array($result)) {
	if ((isset($_POST['user'])) && (isset($_POST['pass']))) {
		if ((($_POST['user']) == $username) && (($_POST['pass']) == $password)) {    
			if (isset($_POST['rememberme'])) {
             /* Set cookie to last 1 year */
				setcookie('user', $_POST['username'], time()+60*60*24*365, '/index.php', 'localhost');
				setcookie('pass', md5($_POST['password']), time()+60*60*24*365, '/index.php', 'localhost');
			} 
			else 							{
            /* Cookie expires when browser closes */
				setcookie('user', $_POST['username'], false, '/index.php', 'localhost');
				setcookie('pass', md5($_POST['password']), false, '/index.php', 'localhost');
				echo "Please log in.";
											}
		{
		else 
			echo 'Username/Password Invalid';
	{	
    else 
		echo 'You must supply a username and password.'; 
?>