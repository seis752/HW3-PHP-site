<!-- DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" -->
<!DOCTYPE  HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
	<title>Simple Form</title>
        <link href="tabA.css" rel="stylesheet" type="text/css"/>
      <!--   <link  href="./scripts/JohnsStyleSheet.css"  rel="stylesheet" type="text/css"/> -->
</head>
// this form is associated with welcome.php
<body>
  <ul class="tabs" data-tab>
    <li class="tab-title active"><a href="#">Tab Index</a></li>
    <li class="tab-title"><a href="welcome.php">Tab Welcome</a></li>
    <li class="tab-title"><a href="profilePage.php">Tab ProfilePage</a></li>
</ul>
    
<h1>SEIS752 Advanced Web Application Development<br />
  Login Form 
</h1>
<form action="welcome.php" method="POST"> 
    Name: <input type="text" name="name"/><br /> 
    Passsword: <input type="text" name="password" /><br /> 
    <input type="submit" value="Submit"/> 
</form> 

</body>
</html>
