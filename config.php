<?php
session_start();

define('DB_SERVER', 'mysql.seis752.com');
define('DB_USERNAME', 'DB_USERNAME');
define('DB_PASSWORD', 'DB_PASSWORD');
define('DB_DATABASE', 'DB_DATABASE');

$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE); 

if(!$db)
{
die('Connection Error:' .mysqli_error());
}

mysqli_select_db($db,$DB_DATABASE);
?>