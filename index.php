<?php
// include the database connection details
require_once("config/database.php");

// login class with initializer immediately called
require_once("api/Login.php");

// create a login object and return object class for method invocations
$login = new Login();

if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    include("views/home.php");
} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    include("views/login.php");
}