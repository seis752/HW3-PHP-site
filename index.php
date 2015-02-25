<?php
include("conn_db.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
$myusername=mysqli_real_escape_string($link,$_POST['username']); 
$mypassword=mysqli_real_escape_string($link,$_POST['password']); 


$sql="SELECT id FROM users WHERE username='$myusername' and password='$mypassword'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$active=$row['active'];
$count=mysqli_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
session_register("myusername");
$_SESSION['login_user']=$myusername;

header("location: loginaccount.php");
}
else 
{
$error="Your Login Name or Password is invalid";
}
}
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Login</title>
<style type="text/css">
input:required {
	border: 1px solid red;
}

html{
background: url(img/background.png);
font-size: 10pt;
}

label{
	display:block;
	color:#999;
	}
.cf:before,
.cf:after{
	content:"";
	display:table;
	}
.cf:after{
	clear: both;
	}
.cf{
	*zoom:1;
	}
:focus{
	outline:0;
	}
.loginform {
	width: 418px;
	margin: 55px auto;
	padding: 97px;
	background-color: rgba(243,250,191,0.5);
	border-radius: 30px;
    box-shadow: 58px 43px 101px 0px rgba(0, 0, 0, 0.2), 
    			inset 0px 1px 0px 0px rgba(250, 250, 250, 0.5);
    border: 8px solid rgba(0, 0, 0, 0.3);
}
.loginform ul{
	padding:0;
	margin:0;
}
.loginform li{
	display:inline;
	float: left;
}


.loginform input:not([type=submit]) {
	padding: 5px;
	margin-right: 10px;
	border: 1px solid rgba(0, 0, 0, 0.3);
	border-radius: 3px;
	box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.1), 
				0px 1px 0px 0px rgba(250, 250, 250, 0.5) ;
}

.loginform input[type=submit] {
	border: 1px solid rgba(0, 0, 0, 0.3);
	background: #64c8ef; /* Old browsers */
	background: -moz-linear-gradient(top,  #64c8ef 0%, #00a2e2 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#64c8ef), color-stop(100%,#00a2e2)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #64c8ef 0%,#00a2e2 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #64c8ef 0%,#00a2e2 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #64c8ef 0%,#00a2e2 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #64c8ef 0%,#00a2e2 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#64c8ef', endColorstr='#00a2e2',GradientType=0 ); /* IE6-9 */
	color: #fff;
	padding: 5px 15px;
	margin-left: 310px;
	margin-right: 0;
	margin-top: 20px;
	border-radius: 3px;
	text-shadow: 1px 1px 0px rgba(0, 0, 0, 0.3);
}
</style>
</head>

<body>

<section class = "loginform cf">
<form action="loginaccount.php" method="post">
	<ul>
		<li>
			<label for="username">Username</label>
			<input type="username" name="username" placeholder="username" required>
		</li>
		<li>
			<label for="password">Password</label>
			<input type="password" name="password" placeholder="password" required>
		</li>
		<li>
			<input type="submit" value="Submit">
		</li>
	</ul>
</form>
</section>

</body>
</html>
