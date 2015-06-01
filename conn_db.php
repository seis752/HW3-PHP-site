<?php 
$db = mysql_connect('mysql.seis752.com', 'seis752qiwen', '5eHDPTHnHn'); 
if (!$db) { 
    die('Could not connect: ' . mysql_error()); 
} 
echo 'Connected successfully'; 
mysql_select_db(seis752qiwen_db); 
$query = sprintf("SELECT * FROM users WHERE user='%s' AND password='%s'",
            mysql_real_escape_string($user),
            mysql_real_escape_string($password));
?> 