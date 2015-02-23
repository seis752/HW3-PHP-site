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
                            <input id="display-name" name="display-name" type="text" />
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once('includes/document-end.php'); ?>
