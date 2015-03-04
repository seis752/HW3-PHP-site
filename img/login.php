<?php
/* These are our valid username and passwords */

$servername = "ftp.llhosts.com";
$username = "llhosts_ericbuhr";
$password = "v9SPf1faFqgn";

try {
    $conn = new PDO("mysql:host=$servername;dbname=llhosts_ericbuhr", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
$sql = "SELECT username,password,displayname FROM users";
$result = $conn->query($sql);

while($row=$result->fetchArray()) 
{ 
	if (isset($_POST['user']) && isset($_POST['pass')) {
     
		if (($_POST['user'] == $useranme) && ($_POST['pass'] == $password)) {    
         
			if (isset($_POST['rememberme'])) {
             /* Set cookie to last 1 year */
             setcookie('user', $_POST['user'], time()+60*60*24*365, '/account', 'www.cambrian3940.net');
             setcookie('pass', md5($_POST['pass']), time()+60*60*24*365, '/account', 'www.cambrian3940.net');
			 
			} else {
             /* Cookie expires when browser closes */
             setcookie('user', $_POST['username'], false, '/account', 'www.cambrian3940.net');
             setcookie('pass', md5($_POST['password']), false, '/account', 'www.cambrian3940.net');
			}
			header('Location: portal.php');
         
		} else 
			echo 'Username/Password Invalid';
		
     
	} else 
	
		echo 'You must supply a username and password.';
}
$conn = null;

?>