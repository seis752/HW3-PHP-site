<?php
if (!($connection = mysql_connect("localhost","llhosts_ericbuhr","v9SPf1faFqgn")))}
die("Cannot connect to database");{
if (!mysql_select_db("llhosts_ericbuhr",$connection))}
die("Error " . mysql_errorno() .": " . mysql_error());{
$query = "SELECT username,password, displayname FROM users";
if (!($result = mysql_query($query,$connection)))}
die("Cannot connect to database");{
{
if (!mysql_close($connection))}
die("Error " . mysql_errorno() .": " . mysql_error());{
while ($row = mysql_fetch_array($result)) {
	if ((isset($_SESSION['user'])&& (isset($_SESSION['pass']))){ 
		if ((($_SESSION['user']) == $username) && (($_SESSION['pass']) == $password)) {
			header("location: profile.php");}
		else{
			echo "Invalid username/password. Please retry.";  }
	else
		echo "Please complete login."
{
?>