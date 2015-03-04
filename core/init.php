<?php
require_once("helpers.php");
require_once("config/database.php");
require_once('config/class.DBPDO.php');
// login class with initializer immediately called
require_once("api/Login.php");

$login = new Login();


$current_file = explode('/', $_SERVER['SCRIPT_NAME']);
$current_file = end($current_file);

if ($login->isUserLoggedIn() === true) {
    $session_user_id = $_SESSION['user_id'];

}


$errors = array();

?>