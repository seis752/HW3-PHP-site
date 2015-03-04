<!DOCTYPE html>
<?php 
include login.php
include checklogin.php
?> 
<head>
	<title>Login Page</title>
</head>
<body>
<h1>Login<br /></h1>
  <div class="grid_1"> &nbsp;</div>
    <div  class="grid_4">
        <form id="form2" name="form1" method="post" action="/forms.php">
          <label>Form with action = POST<br />
            Username
            <input name="user" type="text" id="user" value='' />
          </label>
          <br />
          <label>Password
            <input name="pass" type="text" id="pass" value="" />
          </label>
          <p>
            <label>
              <input type="checkbox" name="rememberme" value="yes" id="rememberme" />
              Remember me</label>
            <br />
          </p>
          <p>
            
            <label>
              <input type="submit" name="submit2" id="submit2" value="Submit" />
            </label>
            <br />
          </p>
        </form>
   </div> 
<?php
if ((isset($_POST['user'])) && (isset($_POST['pass']))) {
	session_start(); 
	$_SESSION['user']=$_POST['user'];
	$_SESSION['password']=$_POST['pass'];
	$_SESSION['rememberme']=$_POST['rememberme'];
}
?>
</body>
</html>