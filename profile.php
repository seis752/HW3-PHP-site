<!DOCTYPE html>
<?php
include navbar.php
include once ('loggedin.php');
include once ('settings.php');
/* These are our valid username and passwords */

$_REQUEST($name);
$sql = "SELECT * FROM messages WHERE usernamemsg='$name'ORDER by date";
$result = $conn->query($sql);
?>

<head>
	<title>Profile</title>
</head>

<body>
<h1>Message Board (sorted by date) </h1> <br />
 
<?php
if $result == NULL
{ 
	echo "You have no messages."
} 		else 
			while($row=$result->fetchArray()) 
{ 
?>
				<table width="90%" border="1" cellpadding="0" cellspacing="0" bordercolor="#EFEFEF">
		    <tr bgcolor="#C8C8C8">
			    <td>Message ID</td>
			    <td>User</td>
			    <td>Date-time</td>
			    <td>Message</td>
			 </tr>
	
		    <?php while($row=$result->fetchArray()) { ?>
				<tr>
				    <td><?php echo $row['messageid']; ?></td>
				    <td><?php echo $row['usernamemsg']; ?></td>
				    <td><?php echo $row['date']; ?></td>
				    <td><?php echo $row['message']; ?></td>
				</tr>
		    <?php?>
	
	    </table>
     
}
<!--------------Content--------------->
<section id="content">
	<div class="wrap-content zerogrid">
		<div class="row block01">
			<div id="main-content" class="col-2-3">
				<div class="wrap-col">
					<div class="box">
						<h2>Post a new message</h2
						<form action="" method="post" autofocus>

							<p>Date: <input type ="date-time" id="date" name="date" aria-describedby="datetime-local" required/>
							<span id="datetime-format" class="help"></span><p/>
							<p>Message: <textarea name='message' id='message' required></textarea><p/>
   
							<p><input type="submit" value="Submit"/><p/>
						</form> 
						<?php
							$messageid=$_POST['messageid'];
							$usernamemsg=$name;
							$date=$_POST['date'];
							$message=$_POST['message'];
						<?php
					</div>
				</div>
			</div>
		</div>
	</div>	

<?php
	if !(message==NULL){
		$db = new mySQL('llhosts_ericbuhr');
		$insert_command = "INSERT INTO messsages (usernamemsg, date, message) VALUES ('$usernamemsg', '$date', '$message')";
			echo $insert_command . "<br />\n";
		    $db->exec($insert_command);
?>
<h2> List of friends<h2>
	<?php
	$sql = "SELECT * FROM relationships WHERE usernamerel='$name'ORDER by friendname";
	$result = $conn->query($sql);
		while($row=$result->fetchArray()) {
						
				<tr>
				    <td><a href=friendmsg.php><?php echo "$row['friendname']";?></a></td>
				</tr>
				tr>
			    <td><input type="button" value="removefriend" name="removefriend" {onclick:"removefriend"=true}> Remove as Friend </input></td>
				</tr>
	<?php
	if removefriend==true {
		$friendname = $row['friendname'];
		$db = new MySQL(llhosts_ericbuhr.sql);
		$delete_command = "DELETE FROM relationships where friendname = '$friendname'";
		$db->exec($delete_command);
		echo "You're friend has been removed.";
    	echo "<br/>";
}
?>
</body>
</html>