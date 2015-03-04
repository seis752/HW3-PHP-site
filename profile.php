<?php
require_once("functions.php");
require_once("db-const.php");
session_start();
?>
<html>
<head>
	<title>User Profile</title>
	<script src="script.js" type="text/javascript"></script><!-- put it on user area pages -->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
<body>

<div class="main-card">


<?php
if (logged_in() == false) {
	redirect_to("login.php");
} else {
    $user_id = $_SESSION['user_id'];


    ## connect mysql server
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    # check connection
    if ($mysqli->connect_errno) {
        echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
        exit();
    }
    ## query database
    # fetch data from mysql database
    $sql = "SELECT * FROM users WHERE user_id = {$user_id} LIMIT 1";

    if ($result = $mysqli->query($sql)) {
        $user = $result->fetch_array();
    } else {
        echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
        exit();
    }

    if ($result->num_rows == 1) {
        # calculating online status
        if (time() - $user['status'] <= (30)) { // 300 seconds = 5 minutes timeout
            $status = "Online";
        } else {
            $status = "Offline";
        }

        // showing the login & register or logout link
        if (logged_in() == true) {
            echo '<div class="right" style="text-align:right;  "><a href="logout.php"><input type="submit" name="submit" class="login login-submit" value="Logout" /></a></div>';
        } else {
            echo '<a href="login.php">Login</a> | <a href="register.php">Register</a>';
        }
        # echo the user profile data
        echo "<div class='right'>{$user['user_name']} </div></br>";




    } else { // 0 = invalid user id
        echo "<p><b>Error:</b> Invalid user ID.</p>";
    }

        echo '<div class="page"><a href="profile.php">Profile | </a><a href="friends.php"> Friends | </a><a href="allusers.php"> All Users</a></div></br>';

    echo '<h3>Messages</h3>';


    //retrieve messages for logged in user
    //$sql = "SELECT * FROM messages WHERE user_id= '$user_id'";
    $sql = "SELECT user_name, date, message FROM messages,users where messages.user_id = '$user_id' and messages.friend_id=users.user_id";

    if ($result = $mysqli->query($sql)) {
        while($row = $result->fetch_assoc()){
            echo "<p>{$row['date']}</p> ";
            echo "<p>From: {$row['user_name']}</p></br>";
            echo "<p style='text-align: left'>{$row['message']}</p></br></br>";
        }
        $result->free();
    } else {
        echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
        if($result->num_rows == 0){
            echo "<p>no messages</p>";
        }
        exit();
    }


}


// showing the login & register or logout link
//if (logged_in() == true) {
//	echo '<a href="logout.php">Log Out</a>';
//} else {
//	echo '<a href="login.php">Login</a> | <a href="register.php">Register</a>';
//}

$mysqli->close();
?>



    </div>
</body>
</html>