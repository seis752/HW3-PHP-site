<?php
include("config.php");

session_start();
// retrieve friends from database
$sql="SELECT username FROM users LIMIT 0, 30";
$result=mysqli_query($db, $sql);

if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result)){
		$_SESSION['show_username']="<li>". $row["username"]."</li>";
	}
}
else 
{
$_SESSION['ShowUserErr'] = "Cannot pull username out";
echo $_SESSION['ShowUserErr'];
}

?>