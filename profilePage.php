<?php
session_start();
if ( !is_writable(session_save_path()) ) {
   echo 'Session save path "'.session_save_path().'" is not writable!'; 
}
ini_set('display_errors', 'on'); error_reporting(-1);

echo '$_SESSION[sid] =   '; echo $_SESSION['sid']; echo '<br />' ;
echo '$_SESSION[name] =  '; echo $_SESSION['name'];  echo '<br />' ;
echo 'session_id() =     '; echo session_id();  echo '<br />' ;
echo 'email =      '; echo  $_SESSION['email'] ;  echo '<br />' ; 
echo 'password =   '; echo  $_SESSION['password'] ;  echo '<br />' ; 
?>
<!DOCTYPE html>

<head>
	<title>Profile Page</title>
	<link rel='stylesheet' href='style.css'>
</head>  
<body>
    <h3> navigation links </h3>
    <ul class ="nav-tabs" >
        <li class="tab-title"> <a href ="index.php?">Tab IndexPage</a></li>
        <li class="tab-title"><a href="welcome.php">Tab WelcomePage</a></li>   
        <li class="tab-title active"> <a href ="#">Tab ProfilePage</a></li> 
        <li class="tab-title"><a href="postMessage.php">Tab PostMessagePage</a></li> 
    </ul>

        <h2    You are now on the Profile Page </h2><br>
        your name and password should have been Posted to this page <br>  <br>
        your name is  <?php echo  $_SESSION['name'] ; $name = $_SESSION['name']  ?> <br> 
        your session_id() is  <?php echo  session_id() ;?> <br> 
        your Email is  <?php echo  $_SESSION['email']; $email = $_SESSION['email'] ;?> <br> 
        your password is  <?php echo  $_SESSION['password'] ; $password = $_SESSION['password']?> <br> 
        <br>
        <?php echo $email ?> , Your friends are: 
     <?php 
    if (!($connection = mysql_connect("mysql.seis752.com","seis752john","ySAw48qrLe")))  {
        die("Error at mysql_connect" . mysql_error()); 
    }
    if (!mysql_select_db("seis752john_db",$connection))  {
        die("Error at select_db" . mysql_errorno() .": " . mysql_error()); }
    
       $query = "SELECT r.userIDs, r.friendIDs, u.UserNames\n"
       . "FROM Relationships r , Users u\n"
       . "WHERE r.friendIDs = u.ID\n"
       . " AND userIDs\n"
       . "IN (\n"
       . "SELECT ID\n"
       . "FROM Users\n"
       . "WHERE UserNames ='" . $email . "'\n"
       . ")\n";

    if (!($result = mysql_query($query,$connection))) {
        die("Error at mysql_query");  }
    print("<TABLE BORDER>\n");
    printf("<TR><TD>Your_userID</TD><TD>friendID</TD><TD>friend_userName</TD></TR>\n");
    while ($row = mysql_fetch_array($result)) {
        printf ("<TR><TD>%s</TD><TD>%s</TD><TD>%s</TD></TR>\n", $row[0], $row[1],$row[2]);
    }
    printf("</TABLE>\n");
    mysql_free_result($result);
    ?> <br>  <a href ="ShowAllUsers.php">GoTO_ShowAllUsers</a> <br>   <?php
    $query = "SELECT message FROM `Messages` m, Users u WHERE u.UserNames ='" . $email . "' AND u.ID = m.senderID ORDER BY timeStamp DESC";
    if (!($result = mysql_query($query,$connection))) {
        die("Error at mysql_query");  }
    print("<TABLE BORDER>\n");
    printf("<TR><TD>message you sent</TD></TR>\n");
    while ($row = mysql_fetch_array($result)) {
        printf ("<TR><TD>%s</TD></TR>\n", $row[0]);
    }
    printf("</TABLE>\n");
    mysql_free_result($result);
?>
    <form action="postMessage.php" method="POST">  
       yourID:  <input type="text" name="yourID"/><br /> 
       friendID: <input type="text" name="friendID"/><br /> 
       message: <input type="text" name="message"><br>
    <input type="submit" value="Submit"/> 
    </form> 
    for debugging  Sue = 1 , friend Ted = 3
            
      <br>   <br>  <?php
    $query = "SELECT m.message, u.UserNames FROM Messages m, Users u 
              WHERE u.UserNames = '" . $email . "' AND u.ID = m.receiverID";
    if (!($result = mysql_query($query,$connection))) {
        die("Error at mysql_query");  }
    print("<TABLE BORDER>\n");
    printf("<TR><TD>message for you</TD></TR>\n");
    while ($row = mysql_fetch_array($result)) {
        printf ("<TR><TD>%s</TD></TR>\n", $row[0]);
    }
    printf("</TABLE>\n");
    mysql_free_result($result);
    if (!mysql_close($connection))  {
        die("Error " . mysql_errorno() .": " . mysql_error()); }
    ?>
</body>

</html>