<?php
include("lock.php");
include("config.php");

session_start();
$mymessage=$_POST['message'];
// messages sent from Form
$sql="UPDATE messages SET message = '$mymessage' WHERE name=$login_session";

if($db->query($sql) === TRUE)
{
$_SESSION['update_msg']="You have updated your message";
}
else 
{
$_SESSION['updateError'] = "Message update failed";
echo $_SESSION['updateError'];
}

?>