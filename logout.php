<?php session_start();
     $_SESSION['email'] = '';
     $_SESSION["password"] = '';
     $_SESSION['name'] = '';
     $_SESSION['newUser'] = '';
     session_regenerate_id(FALSE);
     session_unset();
     header('Location: index.php');

// this should log out a use and clear all session variables
?>