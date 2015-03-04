<?php
	$username = "root";
	$password = "test1234";
	$hostname = "localhost";
	
	$dbhandle = mysql_connect($hostname, $username, $password) or die("Could not connect to database!");
	mysql_select_db("social_network", $dbhandle);
?>
<?php include ("./inc/header.logouser.php" ); 

?>
<?php
$reg = @$_POST['reg'];
//declaring variables to prevent errors
$fn = ""; //First Name
$ln = ""; //Last Name
$un = ""; //Username
$pswd = ""; //Password
$pswd2 = ""; // Password 2
$d = ""; // Sign up Date
$u_check = ""; // Check if username exists
//registration form
$fn = strip_tags(@$_POST['fname']);
$ln = strip_tags(@$_POST['lname']);
$un = strip_tags(@$_POST['username']);
$pswd = strip_tags(@$_POST['password']);
$pswd2 = strip_tags(@$_POST['password2']);
$d = date("Y-m-d"); // Year - Month - Day

if ($reg) {
// Check if user already exists
$u_check = mysql_query("SELECT username FROM USERS WHERE username='$un'");
// Count the amount of rows where username = $un
$check = mysql_num_rows($u_check);
if ($check == 0) {
	//check all of the fields have been filed in
	if ($fn&&$ln&&$un&&$pswd&&$pswd2) 
		{// check that passwords match
			if ($pswd==$pswd2) 
			{// check the maximum length of username/first name/last name does not exceed 25 characters
				if (strlen($un)>25||strlen($fn)>25||strlen($ln)>25) {
					echo "The maximum limit for username/first name/last name is 25 characters!";
				}
				else {
					// check the maximum length of password does not exceed 25 characters and is not less than 5 characters
					if (strlen($pswd)>30||strlen($pswd)<5) 
					{
					echo "Your password must be between 5 and 30 characters long!";
					}
					else
					{
						//encrypt password and password 2 using md5 before sending to database
						$pswd = md5($pswd);
						$pswd2 = md5($pswd2);
						mysql_query("INSERT INTO users VALUES ('','$un','$fn','$ln','$pswd','$d','0','Write something about yourself.','','')");
						die("<h2>Welcome to Social Network</h2>Login to your account to get started ...");
					}
				}
			}
			else {
			echo "Your passwords don't match!";
			}
		}
	else
		{
		echo "Please fill in all of the fields";
		}
	} // closing tag for username check db
	else
	{
	echo "Username already taken ...";
	}
}

//Login Script
if (isset($_POST["user_login"]) && isset($_POST["password_login"])) {
	$user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]); // filter everything but numbers and letters
    $password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]); // filter everything but numbers and letters
	$md5password_login = md5($password_login);

    $sql = mysql_query("SELECT id FROM USERS WHERE username='$user_login' AND password='$md5password_login' LIMIT 1", $dbhandle); // query the person
	//Check for their existance
	$userCount = mysql_num_rows($sql); 
    
	//Count the number of rows returned
	if ($userCount == 1) {
		while($row = mysql_fetch_array($sql))
			{ 
             $id = $row["id"];
			}
		 //$_SESSION["id"] = $id;
		 $_SESSION["user_login"] = $user_login;
		 header('location: /xampp/phpMySql/social_network/home.php');
		 // header('location: /xampp/phpMySql/social_network/profile.php?u='.$_SESSION["user_login"]);
		 //$_SESSION["password_login"] = $password_login;
          // exit("<meta http-equiv=\"refresh\" content=\"0\">");
		} else {
		echo 'That information is incorrect, try again';
		exit();
		}
}
?>
<!doctype html>
<html>
<?php include ( "./inc/header.css.html"); ?>

<body>
<div class="container">
	<div class="row">
		<div class="col-xs-6">
			<img src="./img/logo.png" alt="" width="47" height="50">
		</div>
		<div class="col-xs-6">
			<form action="search.php" method="Get" id="search">
				<input type="text" name="q" size="60" placeholder="Search...." />
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<h2>Already a Memeber? Login below ...</h2> <br>
			<form class="form-horizontal" action="index.php" method="POST" >
			   <input type="text" size="40" name="user_login" placeholder="First Name" class="form-control" /><br /><br />
			   <input type="password" size="40" name="password_login" placeholder="Last Name" class="form-control" /><br /><br />
			   <input type="submit" name="login"  value="Login to your account" class="btn">
		   </form>				
		</div>
		<div class="col-xs-6">
		   <h2>Sign up Below ...</h2><br>
		   <form class="form-horizontal" action="index.php" method="POST" >
			   <input type="text" size="40" name="fname" placeholder="First Name" class="form-control" /><br /><br />
			   <input type="text" size="40" name="lname" placeholder="Last Name" class="form-control" /><br /><br />
			   <input type="text" size="40" name="username" placeholder="Username" class="form-control" /><br /><br />
			   <input type="password" size="40" name="password" placeholder="Password" class="form-control" /><br /><br />
			   <input type="password" size="40" name="password2" placeholder="Password (again)" class="form-control" /><br /><br />
			   <input type="submit" name="reg" value="Sign Up!" class="btn">
		   </form>			
		</div>
	</div>
</div>


<?php //include ("./inc/footer.inc.php") ?>
</body>
</html>