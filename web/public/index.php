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
<?php require_once('includes/navigation.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Login</h1>
                </div>
                <div class="panel-body">
                    <form action="index.php" method="post">
                        <div>
                            <label for="username">Username</label><br/>
                            <input id="username" name="username" type="text" />
                        </div>
                        <div>
                            <label for="password">Password</label><br/>
                            <input id="password" name="password" type="text" />
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once('includes/document-end.php'); ?>
