<!DOCTYPE html>
<html>
    <ul class ="nav-tabs" >
        <li class="tab-title active"> <a href ="index.php?">Menu ->IndexPage</a></li>
        <li class="tab-title"><a href="#">Welcome.php</a></li>   
        <li class="tab-title"> <a href ="profilePage.php">Menu -> ProfilePage</a></li> 
    </ul>
<body>
   <!-- <li class="tab-title"><a href="welcome.php">Tab Welcome</a></li> -->
   Welcome <?php   echo $_POST["name"];  ?><br> <br>
   
   $name =  <?php  $name = $_POST["name"];   echo $name;  ?><br> <br>
   
   Your password is: <?php echo $_POST["password"];  ?> <br>

   $password =  <?php  $password  = $_POST["password"];   echo $password;  ?><br> <br>
  
    <?php    
      if( $password === 'ABC') {
      //  if(strcmp($password, "ABC") == 0){
             echo "password is CORRECT     " ;  
             session_start();
             echo 'Welcome to page #1 session   ';
             echo  SID;
             $_SESSION['name']   = $name;
             $_SESSION['password'] = $password;   
              echo '<br /><a href="profilePage.php?' .SID.'">profilePage</a>'; 
 
        } else {
             echo "password is WRONG";  
        }   ?>
     <br>
</body>
</html>
