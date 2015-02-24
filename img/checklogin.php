<?PHP
if(isset($_COOKIE['cookie'])){
    $cookie = $_COOKIE['cookie'];
}
else{
    // Cookie is not set
	header('Location: http://www.cambrian3940.net/portal.php');
exit;

}
?>