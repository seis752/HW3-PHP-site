<?php
include("config.php");
include("lock.php");
session_start();
// retrieve friends from database
$sql="SELECT friend FROM relationships WHERE username='$login_username'";

$result=mysqli_query($db, $sql);

if(mysqli_num_rows($result) > 0)
{

	while($row = mysqli_fetch_assoc($result)){
		$_SESSION['show_friend']="<li>". $row["friend"]."</li>";

	}
}
else 
{
$_SESSION['NoFriend'] = "You don't have friends";
echo $_SESSION['NoFriend'];
}
mysqli_close($db);
?>