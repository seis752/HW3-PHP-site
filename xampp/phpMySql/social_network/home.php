<?php include ("./inc/header.logouser.php" ); ?>
<?php include ("./inc/connect.inc.php" ); ?>

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
				<div class="col-md-6 " >
		<?php
			if (isset($user)) {
				echo " 
				Welcome " .$user; 
					}
					?>
	 </div>
		</div>
		<div class="col-xs-3">
			<img src="./img/logo.png" alt="" width="47" height="50">
		</div>
	</div>
		<div class="row">
			<div class="col-xs-12 col-md-offset-3">
				<h2>Your New Feed</h2>
			</div>
		</div>
		<div class = "row">
		<div class="col-xs-6">
			<?php 
				if (isset($user)) {
					echo "<a href=/xampp/phpMySql/social_network/logout.php>Log Out</a>";
				}
				?>
			</div>
			<div class="col-xs-6">
			<?php 
				echo "<a href=/xampp/phpMySql/social_network/profile.php?u=$user>Go To Profile</a>"
				?>
			</div>
			<div class="col-xs-6">
			<?php 
				echo "<a href=/xampp/phpMySql/social_network/friend_request.php>Friend Request</a>"
				?>
			</div>
		</div>
		<br />
		<div class="col-md-8">
		<?php 

$getposts = mysql_query("SELECT * FROM posts WHERE user_posted_to='$user' ORDER BY id DESC LIMIT 10") or die(mysql_error());
while ($row = mysql_fetch_assoc($getposts)) {
						$id = $row['id'];
						$body = $row['body'];	
						$date_added = $row['date_added'];
						$added_by = $row['added_by'];
						$user_posted_to = $row['user_posted_to'];  
						echo "
						<div class='col-xs-12 col-md-8'><h3>$body </h3>posted by <mark>$added_by</mark> on $date_added<br><br/> </div>
						";
						}
?>

		</div>
</div>
</body>
</html>			