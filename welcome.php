<?php session_start();
if ( !is_writable(session_save_path()) ) {
   echo 'Session save path "'.session_save_path().'" is not writable!'; 
}
ini_set('display_errors', 'on'); error_reporting(-1);
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome Page</title>
    </head>
    <h3> navigation links </h3>
    <ul class ="nav-tabs" >
        <li class="tab-title active"> <a href ="index.php?">Tab IndexPage</a></li>
        <li class="tab-title"><a href="#">Tab WelcomePage</a></li>   
        <li class="tab-title"><a href ="profilePage.php">Tab ProfilePage</a></li> 
        <li class="tab-title"><a href="testPage.php">Tab TestPage</a></li> 
    </ul>
<body>
    
    <?php
         $email=$_POST['email'];
         $password=$_POST["password"];
         $name=$_POST["name"];
         
         if (!($connection = mysql_connect("mysql.seis752.com","seis752john","ySAw48qrLe")))  {
           die("Error at mysql_connect" . mysql_error()); 
         }
        if (!mysql_select_db("seis752john_db",$connection))  {
            die("Error at select_db" . mysql_errorno() .": " . mysql_error()); }

        $query = "SELECT Passwords FROM `Users` WHERE UserNames = '".$email."' LIMIT 0, 10 ";

        if (!($result = mysql_query($query,$connection))) {
            die("Error at mysql_query");  }
        print("<TABLE BORDER>\n");
        printf("<TR><TD>Passwords</TD></TR>\n");
        while ($row = mysql_fetch_array($result)) {
            printf ("<TR><TD>%s</TD></TR>\n", $row[0]);
            $savedPassword = $row[0];
        }
            printf("</TABLE>\n");

        if (!mysql_close($connection))  {
            die("Error " . mysql_errorno() .": " . mysql_error()); }

         if( $password===$savedPassword) { //&& ($email ==='sam@gmail.com') ){   // WILL NEED MORE LOGIC + SQL LATER
             echo "password is CORRECT     " ; echo '<br />' ; 
             echo 'Welcome   '; echo '<br />' ;
             echo  SID;   echo '<br />' ;
             $_SESSION['email']   = $email;
             $_SESSION['password'] = $password; 
             $_SESSION['name']   = $name;

              echo '<br /><a href="profilePage.php?' . session_name() . ' ='  . session_id() . ' ">PROFILE_PAGE</a>' ;
              
        } else {
             echo "password is WRONG";  
        } 
        echo '<br />WELCOME ' ; $_POST["email"];  ?>
    
      Your user ID is:  <?php echo $_SESSION['email']  ?>;
      Your name is:     <?php echo $_SESSION['name'] ?>;
      Your password is: <?php echo $_SESSION['password'];  ?> <br>
      
      SESSION name is:  <?php echo $_SESSION['name'] ?>;
      SESSION(ID) is    <?php echo session_id() ?>;
     <br>
     <?php
 /*    
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
   $sql = "SELECT UserNames, Passwords\n"
    . "FROM Users\n"
    . "WHERE UserNames = \'sue@gmail.com\' ";
*/
?>
</body>
</html>
