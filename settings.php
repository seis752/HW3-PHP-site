<?php
  if(!isset($_SESSION['user'])){
  	session_start();
  }
  
	$hostname_db = "mysql.seis752.com";
	$database_db = "seis752jed_db";
	$username_db = "seis752jed";
	$password_db = "LddnXSyhDX";
	 
	$con = @mysql_connect($hostname_db,$username_db,$password_db); 
	  if (!$con)
	  {
	    die('Could not connect: ' . mysql_error());
	  }
	mysql_select_db($database_db, $con);
?>
