<?php
include("config.php");
include("pickfriend.php");
session_start();


// retrieve message from database
$sql="SELECT username, message, date FROM messages WHERE username='$friend_name'";
$result=$db->query($sql);

if($result->num_rows>0)
{
$row=$result->fetch_assoc();
$_SESSION['view_msg']="Your friend: ".$row[username]." said: ".$row["message"]." At:".$row["date"]."";

}
else 
{
$_SESSION['MsgError'] = "Message failed to load";
echo $_SESSION['MsgError'];
}
$db->close();
?>