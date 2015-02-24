<?php

require_once('../application/bootstrap.php');

$authenticationService = new AuthenticationService(new Database());
$userService = new UserService(new Database());

$title = 'Register';

session_start();

if (AuthenticationService::isAuthenticated())
{
    header('Location: profile.php');
}

// Handle "regsiter" action.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['username']) && isset($_POST['password']))
    {
        if ($userService->register($_POST['username'], $_POST['password'], $_POST['display_name']))
        {
            if ($authenticationService->authenticate($_POST['username'], $_POST['password']))
            {
                header('Location: profile.php');
            }
        }
    }
}

?>
<?php require_once('includes/document-start.php'); ?>
<?php require_once('includes/navigation.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Register</h1>
                </div>
                <div class="panel-body">
                    <form action="register.php" method="post">
                        <div>
                            <label for="username">Username</label><br/>
                            <input id="username" name="username" type="text" />
                        </div>
                        <div>
                            <label for="password">Password</label><br/>
                            <input id="password" name="password" type="text" />
                        </div>
                        <div>
                            <label for="display-name">Display Name</label><br/>
                            <input id="display-name" name="display_name" type="text" />
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once('includes/document-end.php'); ?>
