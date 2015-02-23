<?php

require_once('../application/bootstrap.php');

$authenticationService = new AuthenticationService(new Database());

$title = 'Login';

session_start();

if (AuthenticationService::isAuthenticated())
{
    header('Location: profile.php');
}

// Handle form submission.
if (isset($_POST['username']) && isset($_POST['password']))
{
    if ($authenticationService->authenticate($_POST['username'], $_POST['password']))
    {
        header('Location: profile.php');
    }
}

?>
<?php require_once('includes/document-start.php'); ?>

<h1>Login</h1>

<form action="index.php" method="post">
    <label for="username">Username</label>
    <input id="username" name="username" type="text" />
    <label for="password">Password</label>
    <input id="password" name="password" type="text" />
    <button type="submit">Submit</button>
</form>

<div><a href="register.php">Register</a></div>

<?php require_once('includes/document-end.php'); ?>
