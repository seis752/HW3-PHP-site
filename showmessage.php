<?php
include("config.php");
include("lock.php");
session_start();
// retrieve message from database
$sql="SELECT message, date FROM messages WHERE name='$login_session'";
$result=$db->query($sql);

if($result->num_rows>0)
{
$row=$result->fetch_assoc();
$_SESSION['show_message']=$row["message"];
$_SESSION['show_date']=$row["date"];
}
else 
{
$_SESSION['MsgError'] = "Message failed to load";
echo $_SESSION['MsgError'];
}
$db->close();
?>