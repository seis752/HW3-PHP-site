<?php include ("./inc/header.logouser.php" ); ?>
<?php include ("./inc/connect.inc.php" ); ?>
<?php
if (isset($_GET['u'])) {
	$username = mysql_real_escape_string($_GET['u']);
	if (ctype_alnum($username)) {
 	//check user exists
	$check = mysql_query("SELECT username, first_name FROM users WHERE username='$username'");
	if (mysql_num_rows($check)===1) {
	$get = mysql_fetch_assoc($check);
	$username = $get['username'];
	$firstname = $get['first_name'];	
	}
	else
	{
	echo "<h2> User Does Not Exist!</h2>";
	exit();
	}
	}
}
else
{
	if($user !="")
	{
		header('location: /xampp/phpMySql/social_network/profile?u='.$user);
	}
	else
	{
		header('location: /xampp/phpMySql/social_network/index.php');
	}
}
if($user =="")
{
	header('location: /xampp/phpMySql/social_network/index.php');
}

?>
<?php


//$post = @$_POST['post'];
//echo 'here is the body '.$post;
//if ($post !=="")
//{
//	echo 'What isthe username: '.$username;
	//$date_added = date("Y-m-d");
	//$added_by = $user;
	//$user_posted_to = $username;
if (isset($_POST['send'])) { 
	$post = @$_POST['post'];
	$date_added = date("Y-m-d");
	$added_by = $user;
	$user_posted_to = $username;

	$sqlCommand = "INSERT INTO posts VALUES('', '$post','$date_added','$added_by','$user_posted_to')";  
	$query = mysql_query($sqlCommand) or die (mysql_error()); 
	//header('location: /xampp/phpMySql/social_network/profile.php?u='.$username);
}

?>
<br />
<!DOCTYPE html>
<!-- <div id="wrapper">
<div id="status"></div> -->
<?php include ( "./inc/header.css.html"); ?>
<body>
<div class="container">
	<div class="row">
		<div class="col-xs-3">
				<form action="search.php" method="Get" id="search">
					<input type="text" name="q" size="60" placeholder="Search...." />
				</form>
				
				<div class="col-md-6" >
		<?php
			if (isset($username)) {
				echo "
				<div class='lead'>
				User Loddedin :" .$user;
					}
					?>
	 			</div>
		</div>
		<div class="col-xs-3">
			<img src="./img/logo.png" alt="" width="47" height="50">
		</div>
		
	</div>
			<div class="col-xs-6">
			<?php 
			if (isset($username)) {
				echo "<a href=/xampp/phpMySql/social_network/logout.php>Log Out</a>";
			}
				?>
		</div>
		<div class="col-xs-6">
			<?php 
			if (isset($username)) {
				echo "<a href=/xampp/phpMySql/social_network/home.php>Go To Newfeed</a>";
			}
				?>
		</div>
		<div class="col-xs-6">
			<?php 
			if (isset($username)) {
				echo "<a href=/xampp/phpMySql/social_network/friend_request.php>Friend Request</a>";
			}
				?>
		</div>
	<div class = "row">
		<div class="col-xs-12">
		<form action="<?php echo $_SERVER['PHP_SELF'] . "?u=". $username; ?>" method="POST" >
			    <textarea id="post" name="post" rows="4" cols="50"></textarea>
			    <input type="submit" name="send" value="Post" />
			    
			    <!-- <input name="statuspost" value="statuspost" type="submit" class="btn" /> -->
		</form>
		</div>
	</div>

	

<?php 
$getposts = mysql_query("SELECT * FROM posts WHERE user_posted_to='$username' ORDER BY id DESC LIMIT 10") or die(mysql_error());
while ($row = mysql_fetch_assoc($getposts)) {
						$id = $row['id'];
						$body = $row['body'];	
						$date_added = $row['date_added'];
						$added_by = $row['added_by'];
						$user_posted_to = $row['user_posted_to'];  
						echo "
						<div class='col-xs-12 col-md-8'>$body posted by <mark>$added_by</mark> on $date_added </div>
						";
						}
?>

<?php
$errorMsg = "";
if (isset($_POST['addfriend'])) { 
	$friend_request_to = $username;
	$friend_request_from = $user;
 
	if ($user == $username) {
		$errorMsg = "You can't send a friend request to yourself!<br />";
		if (isset($_GET['u'])) {
			$username = mysql_real_escape_string($_GET['u']);
			}
		}
	else{
		#echo "testing is invalid";
		$create_request = mysql_query("INSERT INTO relationships VALUES ('','$friend_request_from','$friend_request_to')");
		$errorMsg = "Your friend Request has been sent!";
		}
	}
	else{

  }
  	//$user = logged in user.
  	//$username = The profile you are at.
  if(@$_POST['removefriend'])
  {
  	// Friend array for logged in user. 
  	$add_friend_check = mysql_query("Select friend_array from users where username='$user'");
  	$get_friend_row = mysql_fetch_assoc($add_friend_check);
  	$friend_array = $get_friend_row['friend_array'];
  	$friend_array_explode = explode(",", $friend_array);
  	$friend_array_count = count($friend_array_explode);

	// Friend array for user whose owns profile.
  	$add_friend_check_username = mysql_query("Select friend_array from users where username='$username'");
  	$get_friend_row_username = mysql_fetch_assoc($add_friend_check_username);
  	$friend_array_username = $get_friend_row['friend_array'];
  	$friend_array_explode_username = explode(",", $friend_array_username);
  	$friend_array_count_username = count($friend_array_explode_username);

  	$usernameComma = ",".$username;
	  $usernameComma2 = $username.",";
	  
	  $userComma = ",".$user;
	  $userComma2 = $user.",";
	  
	  if (strstr($friend_array,$usernameComma)) {
	   $friend1 = str_replace("$usernameComma","",$friend_array);
	  }
	  else
	  if (strstr($friend_array,$usernameComma2)) {
	   $friend1 = str_replace("$usernameComma2","",$friend_array);
	  }
	  else
	  if (strstr($friend_array,$username)) {
	   $friend1 = str_replace("$username","",$friend_array);
	  }
	  //Remove logged in user from other persons array
	  if (strstr($friend_array,$userComma)) {
	   $friend2 = str_replace("$userComma","",$friend_array);
	  }
	  else
	  if (strstr($friend_array,$userComma2)) {
	   $friend2 = str_replace("$userComma2","",$friend_array);
	  }
	  else
	  if (strstr($friend_array,$user)) {
	   $friend2 = str_replace("$user","",$friend_array);
	  }

	  $friend2 = "";

	  $removeFriendQuery = mysql_query("UPDATE users SET friend_array='$friend1' WHERE username='$user'");
	  $removeFriendQuery_username = mysql_query("UPDATE users SET friend_array='$friend2' WHERE username='$username'");
	  echo "Friend Removed ...";
	  $urlVariable = $_SERVER['PHP_SELF']."?u=".$username;
	  // header("Location: $_SERVER['PHP_SELF'] . "?u=". $username");
	  	//header("'ocation: $_SERVER["PHP_SELF"]."?u=".$username;
	  header('location: '.$urlVariable);
  }
?>
<div class="row">
<div class ="col-xs-6">
	<img src="" height="250" width="200" alt="<?php echo $username; ?>'s Profile" title="<?php echo $username; ?>'s Profile" />
	<br />
	<?php echo "Who is user:" .$user; ?> <br>
	<?php echo "Who is username:" .$username; ?>

	<form method = "post" action="<?php echo $_SERVER['PHP_SELF'] . "?u=". $username; ?>">

	<?php 

	$friendsArray = "";
	$countFriends = "";
	$friendsArray12 = "";
	$addAsFriend = "";
	$selectFriendsQuery = mysql_query("SELECT friend_array FROM users where username='$username'");
	$friendRow = mysql_fetch_assoc($selectFriendsQuery);
	$friendArray = $friendRow['friend_array'];

	if ($friendArray != "") {

		$friendArray = explode("," , $friendArray);
		$countFriends = count($friendArray);
		$friendArray12 = array_slice($friendArray, 0, 12);
$i=0;

if( in_array($user, $friendArray)) {
	$addAsFriend = '<input type="submit" name="removefriend" value="Remove Friend">';
}
else
{
	$addAsFriend = '<input type="submit" name="addfriend" value="Add as Friend">';
}
echo $addAsFriend;
}
else
{
 $addAsFriend = '<input type="submit" name="addfriend" value="Add Friend">';
 echo $addAsFriend;
}
?>
	<?php echo $errorMsg; ?>
	</form>
	<br />
</div>
<div class ="col-md-6">
	<div class="lead"> <?php echo $username; ?>'s Bio Quotes</div>
	<?php
		$about_query = mysql_query("SELECT bio FROM USERS WHERE username = '$username'");
		$get_result = mysql_fetch_assoc($about_query);
		$about_the_user = $get_result['bio'];
		
		echo $about_the_user;
	?>

	<div class="lead"><?php echo $username; ?>'s Friends <br>
	<?php
		if ($countFriends != 0) {
		foreach ($friendArray12 as $key => $value) {
			 $i++;

			 $getFriendQuery = mysql_query("SELECT * FROM users WHERE username='$value' LIMIT 1");
			 $getFriendRow = mysql_fetch_assoc($getFriendQuery);
			 $friendUsername = $getFriendRow['username'];
			 echo "$friendUsername <br/>";
						 }
					}
				else
				echo $username." has no friends yet.";
				?>
		</div>
		</div>
	</div>
</div>

</body>
</html>