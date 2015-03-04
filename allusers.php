<?php
require_once("functions.php");
require_once("db-const.php");
session_start();
?>
<html>
<head>
    <title>All Users</title>
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


        //add a friend
        if (isset($_POST['add friend'])) {
            $user_id = $_POST['user_id'];
            $friend_id	= $_POST['friend_id'];

            $sql = "INSERT  INTO `relationships` (`user_id`, `friend_id`) VALUES (NULL, '{$user_id}', '{$friend_id}')";
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


        echo '<h3>Users</h3>';


        //retrieve messages for logged in user
        $sql = "SELECT * FROM users ";

        if ($result = $mysqli->query($sql)) {
            while($row = $result->fetch_assoc()){
                echo '<form action="" method="post"><p><input type="submit" name="submit" class="login login-submit" value="add friend" align="right"/></p></form>';
                echo "<p>{$row['user_name']}</p></br>";

//                echo "<div class='right'>{$row['user_name']}</div>";
//                echo '<div class="right"><input type="submit" name="submit" class="login login-submit" value="Add Friend" align="right"/></div></br>';
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



</body>
</html>