<?php


// include the configs / constants for the database connection
require_once("config/database.php"); #todo repeated here avoid


require_once("api/Registration.php");

// create the registration object
$registration = new Registration();

// show the register view (with the registration form, and messages/errors)
include("views/register_user.php");

