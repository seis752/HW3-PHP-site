<?php
include login.php
if(isset($_SESSION['session'])){
  	$session = $_SESSION['session'];
}
else{
    // Cookie is not set
	header('Location:/index.php');
	{
exit;
?>