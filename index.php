<!DOCTYPE html>
<?php
include checklogin.php
include navbar.php
/* These are our valid username and passwords */

$servername = "ftp.llhosts.com";
$username = "llhosts_ericbuhr";
$password = "v9SPf1faFqgn";

try {
    $conn = new PDO("mysql:host=$ftp.llhosts.com;dbname=llhosts_ericbuhr", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
$sql = "SELECT messageid, usernamemsg, date, message FROM messages ORDER by date DESC";
$sql2 = "SELECT relationshipid, usernamerel, friendname from relationships ORDER by friendname DESC;
$sql3 = "SELECT username, password, displayname;
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
?>

<head>
	<title>Profile</title>
</head>

<body>
<h1>Message Board (sorted by date) <br />
 
</h1>
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
						<h2>Post a new message</h2>
						<?php
							$messageid=$_POST['messageid'];
							$usernamemsg=$_POST['usernamemsg'];
							$date=$_POST['date'];
							$message=$_POST['message'];
						<?php
					</div>
				</div>
			</div>
		</div>
	</div>	
<form action="" method="post" autofocus>

	<p>Date: <input type ="date-time" id="date" name="date" aria-describedby="datetime-local" required/>
	<span id="datetime-format" class="help"></span><p/>
    <p>Message: <textarea name='message' id='message' required></textarea><p/>
   
    <p><input type="submit" value="Submit"/><p/>
</form> 
<?php
	if !(message==NULL)
		For i (i=0;i++)
			messageid = i;
		i = $messageid; 
		GET $COOKIE ($user, $pass);
	user = usernamemsg;
	user = $usernamemsg; 
		$db = new mySQL('llhosts_ericbuhr');
		$insert_command = "INSERT INTO messsages (messageid, usernamemsg, date, message) VALUES ('$messageid', '$usernamemsg', '$date', '$message')";
		    echo $insert_command . "<br />\n";
		    $db->exec($insert_command_1);
?>
<h2> List of friends<h2>
	<?php
	
		while($row=$result2->fetchArray()) {
			if $usernamerel == $user
	?>			
				<tr>
				    <td><?php echo $row['friendname']; ?></td>
				    
				</tr>
				tr>
			    <td><input type="button" value="removefriend" name="removefriend" {onclick:"removefriend"=true}> Remove as Friend </input></td>
				</tr>
	<?php
	
	if removefriend==true
		friendname = $friendname;
		
		$db = new MySQL(llhosts_ericbuhr.sql);
		$delete_command = "DELETE FROM relationships where friendname = 'friendname'";
		$db->exec($delete_command);
		echo "Records deleted";
    	echo "<br/>";

							
$conn = null;
?>
</body>

</html>