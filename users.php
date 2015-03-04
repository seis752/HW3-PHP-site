<!DOCTYPE html>
<?php
include navbar.php
include checklogin.php
/* These are our valid username and passwords */

$servername = "ftp.llhosts.com";
$username = "llhosts_ericbuhr";
$password = "v9SPf1faFqgn";

try {
    $conn = new PDO("mysql:host=$servername;dbname=llhosts_ericbuhr, $username, $password");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
$sql = "SELECT username, displayname FROM users ORDER by displayname";
$sql2 = "SELECT relationshipid, usernamerel, friendname from relationships ORDER by friendname DESC;
$result = $conn->query($sql);
$result2 = $conn->query($sql2);

?>

<head>
	<title>Users</title>
</head>

<body>
<h1> List of all users <br />
 
</h1>
<?php
while($row=$result->fetchArray()) 
 
?>
	<table width="90%" border="1" cellpadding="0" cellspacing="0" bordercolor="#EFEFEF">
		<tr bgcolor="#C8C8C8">
			    <td>Name</td>
		</tr>
	
		    <?php while($row=$result->fetchArray()) { ?>
				<tr>
				    <td><?php echo $row['displayname']; ?></td>
				</tr> 
		  <tr>
			    <td><input type="button" value="makefriend" name="makefriend" {onclick:"makefriend"=true}> Add as Friend </input></td>
		</tr>
	
	    </table>
<?php
	if makefriend==true
		for x( x=5, x++)
			x = relationshipid;
		$relationshipid = x;
		$relationshipid = relationshipid;
		$relationshipid = $_POST['relationshipid'];
		$user=$_POST['usernamerel'];
		$username=$_POST['friendname'];
		$db = new MySQL(llhosts_ericbuhr.sql);
			if($!usernamerel="" && $friendname!="") {
				$insert_command_1 = "INSERT INTO relationships (relationshipid, usernamerel, friendname) VALUES ('$relationshipid', '$usernamerel', '$friendname')";
				$db->exec($insert_command_1);
				$db = new MySQL("llhosts_ericbuhr.sql");
				$result2 = $db->query("select * from relationships");
?>
	</body>
</html>
