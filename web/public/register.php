<?php

require_once('../application/bootstrap.php');

$title = 'Register';

session_start();

if (AuthenticationService::isAuthenticated())
{
    header('Location: profile.php');
}

?>
<?php require_once('includes/document-start.php'); ?>

<div class="container">
<h1>Register</h1>

<form action="register.php" method="post">
    <label for="username">Username</label>
    <input id="username" name="username" type="text" />
    <label for="password">Password</label>
    <input id="password" name="password" type="text" />
    <label for="display-name">Display Name</label>
    <input id="display-name" name="display-name" type="text" />
    <button type="submit">Submit</button>
</form>

<div><a href="index.php">Login</a></div>
    </div>

<?php require_once('includes/document-end.php'); ?>
