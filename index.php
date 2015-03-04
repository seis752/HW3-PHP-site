<?php
include("config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
$myusername=mysqli_real_escape_string($db,$_POST['username']); 
$mypassword=mysqli_real_escape_string($db,$_POST['password']); 


$sql="SELECT id FROM users WHERE username='$myusername' and password='$mypassword'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$active=$row['active'];
$count=mysqli_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
$_SESSION['login_user']=$myusername;

header("location: loginaccount.php");
}
else 
{
$_SESSION['Error'] = "Your Login Name or Password is invalid";

}
}

if($_SERVER[REQUEST_METHOD] == "GET")
{
// Pull customer information out
$cname=mysqli_real_escape_string($db,$_POST['search']); 
$cusername=mysqli_real_escape_string($db,$_POST['search']); 
$clat=mysqli_real_escape_string($db,$_POST['search']); 
$clon=mysqli_real_escape_string($db,$_POST['search']); 

$sql="SELECT name FROM users WHERE name='$cname' OR username='$cname' OR lat='$clat' OR lon='$clon'";
$result= mysqli_query($db,$sql);
$count=mysqli_num_rows($result);
if($count==1)
{
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
	
	<link rel="shortcut icon" href="faviorico_qh.ico" type="image/x-icon">
	<link rel="icon" href="faviorico_qh.ico" type="image/x-icon">
	<link href="css/bootstrap.css" rel='stylesheet' type="text/css" />
	<link href="css/style.css" rel='stylesheet' type="text/css" />
</head>

<body>
	<div class="header">
		<div class="container">
			<div class="row">
			  <div class="col-md-12">
				 <div class="header-left">
					 <div class="logo">
						<a href="index.html"><img src="../img/logo.png" alt=""/></a>
					 </div>
					 <div class="menu">
						    <ul class="nav" id="nav">
						    	<li class="current"><a style= "font-size:28px" href="index.php">Home</a></li>
						    	<li><a style= "font-size:28px" href="index.php">Home</a></li>
						    	<li><a style= "font-size:28px" href="index.php">Home</a></li>

							<div class="clear"></div>
							</ul>
				    </div>							
	    		    <div class="clear"></div>
	    	     </div>
				</div>
			</div>
	    </div>
	</div>
	
<div class="main">	  
	<div class="space"></div>
<section class = "loginform cf">
	<h3 style="color:gray">Please login your account</h3>
<form action="" method="post">
	<ul>
		<li>
			<label>Username</label>
			<input type="username" name="username" placeholder="username" required>
		</li>
		<li>
			<label>Password</label>
			<input type="password" name="password" placeholder="password" required>
		</li>
		<li>
			<input type="submit" value="Submit">

		</li>
	</ul>
	<?php
	echo $_SESSION['Error'];
    unset($_SESSION['Error']);
	?>
</form>
</section>

<section class = "searchform cf">
<form action="" method="get">
	<ul>
		<li>
			<label>Search </label>
			<input id="bar" type="Search" name="search" >
			<input id="submit" type="submit" value="Submit Using Ajax">
			<input id="submit" type="submit" value="Submit Using JQuery">
		</li>

	</ul>
</form>
</section>


</body>
</html>
