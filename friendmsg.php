<!DOCTYPE html>
<?php
include navbar.php
include checklogin.php

/* These are our valid username and passwords */

$servername = "localhost";
$username = "llhosts_ericbuhr";
$password = "v9SPf1faFqgn";

try {
    $conn = new PDO("mysql:host=$servername;dbname=llhosts_ericbuhr", $username, $password);
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
	<title>Friend's messages</title>
</head>

<body>
<h1>Friend's messages </h1><br />
 

<?php
while($row=$result2->fetchArray()) {
			if $usernamerel == $user
				while($row=$result3->fetchArray()); {
					if $result2['friendname']=($result3['username'])
						($row=$result->fetchArray());
													}
											}

if $result == NULL
{ 
	echo "Your friend has no messages."
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
		   	
	    </table>
     
</body>
</html>