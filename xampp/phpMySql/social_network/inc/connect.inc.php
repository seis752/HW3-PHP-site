<?php
	$use = "root";
	$password = "test1234";
	$hostname = "localhost";
	
	$dbhandle = mysql_connect($hostname, $use, $password) or die("Could not connect to database!");
	mysql_select_db("social_network", $dbhandle);

?>