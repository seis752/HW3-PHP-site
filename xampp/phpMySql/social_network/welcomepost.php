<html>
<head>
<title> Delegate edit form</title><br />
<head>
</head>
<body>
<h3>Testing Page!</h3>
<?php
session_start();
$usernm="root";
$passwd="test1234";
$host="localhost";
$database="social_network";

//$Name=$_POST['Name'];
//$Username=$_POST['User_name'];
//$Password=$_POST['Password'];

mysql_connect($host,$usernm,$passwd);

mysql_select_db($database);

$sql = "SELECT * FROM utest";
$result = mysql_query ($sql) or die (mysql_error ());
while ($row = mysql_fetch_array ($result)){

echo 'hello '. $Username=$row['username']; 
echo '<br />';
// $Password=$row['password'];
}

if (isset($_POST['submit'])){
    mysql_connect ("localhost", "root", "test1234") or die ('Error: ' . mysql_error());
    mysql_select_db("social_network") or die ('Data error:' . mysql_error());
    $text = mysql_real_escape_string($_POST['username']); 
    $inertPost = mysql_query("INSERT INTO utest (username) VALUES ('$text')") or die(mysql_error());
    header('location: /xampp/phpMySql/social_network/welcomepost.php');
}

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <textarea name="username">Example Comment</textarea>
    <input name="submit" type="submit" value="submit" />
</form>
</body>
</html>