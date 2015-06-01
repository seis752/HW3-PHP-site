<?php
include("config.php");
include("lock.php");
session_start();
// retrieve friends from database
$ses_sql=mysqli_query($db,"SELECT friend FROM relationships WHERE username='$login_username'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$friend_name=$row['friend'];


?>