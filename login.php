<?php
	
	session_start();

	$username = $_POST['username'];	
    $password = $_POST['password'];
    
    if ($username&&$password)
    	{
    		$conn = mysqli_connect("mysql.seis752.com", "seis752jed", "LddnXSyhDX") or die("Connection Failed!");
    		mysqli_select_db($conn, "seis752jed_db") or die ("Database was not found!");
    		
    		$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    		
    		$numrows = mysqli_num_rows($query);
    		
    		if ($numrows != 0)
    			{	
    				while ($row = mysqli_fetch_assoc($query))
    					{
    						$dbusername = $row['username'];
    						$dbpassword = $row['password'];
    					}
    					
    					if ($username==$dbusername&&$password==$dbpassword)
    						{
    							echo "Success! <a href='member.php'>Click</a> here to enter the member page";
    							$_SESSION['username'] = $username;
    						}    						
    						
    						else
    							echo "Incorrect username and password!";
    			}
    				else
    					die("Username does not exist");
    		
    	}   					
    					
    	else
    		die ("Please enter a username and password");
?>

