<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'seis752mike_db');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

function SignIn()
{ session_start(); //starting the session for user profile page
	if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-In.html, is it empty or have some text
	{
		$query = mysql_query("SELECT * FROM users where username = '$_POST[user]' AND password = '$_POST[pass]'") or die(mysql_error());
		$row = mysql_fetch_array($query);
		if(!empty($row['username']) AND !empty($row['password']))
		{
			$_SESSION['username'] = $row['password'];
			echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";

			printf("<br><table>\n");
			printf("<tr><td>Messages</td></tr>\n");
			$queryMessages = mysql_query("SELECT message FROM messages where username = '$_POST[user]'");
			while($queryRow = mysql_fetch_array($queryMessages)){
				printf("<tr><td></td>%s</tr>\n",$queryRow[0]);
			}
			printf("</table>\n");
		}
		else
		{
			echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
		}
	}
	else
	{
		echo "SORRY... must enter a user id and password";
	}
}
if(isset($_POST['submit']))
{
SignIn();
}

?>

