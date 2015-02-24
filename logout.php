!DOCTYPE html>
<?php
include checklogin.php
include navbar.php
setcookie('user', $_POST['user'], time()-3600, '/account', 'www.cambrian3940.net');
setcookie('pass', md5($_POST['pass']), time()-3600, '/account', 'www.cambrian3940.net');
?>

<head>
	<title>Logout</title>
</head>

<body>
<h1> You are now logged out. Thanks for visiting. <br />
 
</h1>