<?php
// include the database connection details
include 'core/init.php';
include 'views/common/header.php';


// create a login object and return object class for method invocations
$login = new Login();


if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    require_once('messages.php');

} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    include("views/login.php");
}?>


<?php include 'views/common/footer.php'?>
