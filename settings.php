<?php
session_start();
$hostname_db = "ftp.llhosts.com";
$database_db = "llhosts_ericbuhr";
$username_db = "llhosts_ericbuhr";
$password_db = "v9SPf1faFqgn";
$con = mysql_connect($hostname_db,$username_db,$password_db); 
$soru = 'CREATE DATABASE '.$database_db;
mysql_query($soru);
	if (!$con)
	{
	    die('Could not connect: ' . mysql_error());
	}
mysql_select_db($database_db, $con);
?>
