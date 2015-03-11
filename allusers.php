<!DOCTYPE html>
<?php
include navbar.php
include once ('loggedin.php');
include once ('settings.php');
/* These are our valid username and passwords */
$sql = "SELECT * FROM users ORDER by name AND * FROM relationships ORDER by friendname";
//$sql2 = "SELECT relationshipid, usernamerel, friendname from relationships ORDER by friendname DESC;
$result = $conn->query($sql);
//$result2 = $conn->query($sql2);
$_REQUEST['user'];
$user = $name;
?>
<head>
	<title>Users</title>
</head>
<body>
<h1> List of all users </h1><br />
<?php
while($row=$result->fetchArray()) 
?>
	<table width="90%" border="1" cellpadding="0" cellspacing="0" bordercolor="#EFEFEF">
		<tr bgcolor="#C8C8C8">
			    <td>Name</td>
		</tr>
	
		    <?php while($row=$result->fetchArray()) { ?>
				<tr>
				    <td><?php echo $row['name']; ?></td>
				</tr> 
		  <tr>
			    <td><input type="button" value="makefriend" name="makefriend" {onclick:"makefriend"=true}> Add as Friend </input></td>
		</tr>
	
	    </table>
<?php
	if makefriend==true
		$user=$usernamerel;
		$friendname=$row['name'];
		$db = new MySQL(llhosts_ericbuhr.sql);
			if($usernamerel!="" && $friendname!="") {
				$insert_command_1 = "INSERT INTO relationships (usernamerel, friendname) VALUES ('$usernamerel', '$friendname')";
				$db->exec($insert_command_1);
				$db = new MySQL("llhosts_ericbuhr.sql");
				$result = $db->query("select * from relationships");
				echo "The user has been added to your friends."
?>
	</body>
</html>
