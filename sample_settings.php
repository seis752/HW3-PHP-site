<?php
  session_start();
  
	$hostname_db = "servername";
	$database_db = "dbame";
	$username_db = "username";
	$password_db = "password";
	 
	$con = mysql_connect($hostname_db,$username_db,$password_db); 
	  if (!$con)
	  {
	    die('Could not connect: ' . mysql_error());
	  }
	mysql_select_db($database_db, $con);
?>
