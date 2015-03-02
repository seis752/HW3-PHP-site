<!doctype html>
<html>

<?php

include_once 'views/common/head.php';

?>

<body>
<?php
    include 'core/init.php';
    $login = new Login();

    if ($login->isUserLoggedIn() == true) {
        include_once 'views/common/nav.php';
    }
?>

<?php include_once 'views/content_holder.php'; ?>

