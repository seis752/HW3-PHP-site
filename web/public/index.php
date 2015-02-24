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
    $clean = array();
    $validationResult = new ValidationResult();

    // Check the input data

    // username
    if (!isset($_POST['username']))
    {
        $validationResult->addError('username', 'Username is required');
    }
    else
    {
        $testCount = 2;
        $testsPassedCount = 0;

        if (ctype_alnum($_POST['username']))
        {
            $testsPassedCount++;
        }
        else
        {
            $validationResult->addError('username', 'Username must be alphanumeric');
        }

        if (strlen(trim($_POST['username'])) > 0)
        {
            $testsPassedCount++;
        }
        else
        {
            $validationResult->addError('username', 'Username must be at least 1 character');
        }

        if ($testsPassedCount == $testCount)
        {
            $clean['username'] = $_POST['username'];
        }
    }

    // password
    if (!isset($_POST['password']))
    {
        $validationResult->addError('password', 'Password is required');
    }
    else
    {
        $testCount = 2;
        $testsPassedCount = 0;

        if (ctype_alnum($_POST['password']))
        {
            $testsPassedCount++;
        }
        else
        {
            $validationResult->addError('password', 'Password must be alphanumeric');
        }

        if (strlen(trim($_POST['password'])) >= 4)
        {
            $testsPassedCount++;
        }
        else
        {
            $validationResult->addError('password', 'Password must be at least 4 character');
        }

        if ($testsPassedCount == $testCount)
        {
            $clean['password'] = $_POST['password'];
        }
    }

    if (isset($clean['username']) &&
        isset($clean['password']))
    {
        $validationResult->setIsValid(true);
    }

    if ($validationResult->getIsValid())
    {
        if ($authenticationService->authenticate($clean['username'], $clean['password']))
        {
            header('Location: profile.php');
        }
    }
}

?>
<?php require_once('includes/document-start.php'); ?>
<?php require_once('includes/navigation.php'); ?>

<div class="container content-container">
    <div class="row">
        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Login</h1>
                </div>
                <div class="panel-body">
                    <form action="index.php" method="post">

                        <?php if (isset($validationResult) && !$validationResult->getIsValid()): ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Fail!</strong> Unable to find user matching the provided username and password
                            </div>
                        <?php endif; ?>

                        <div class="form-row">
                            <label for="username">Username</label><br/>
                            <input id="username" name="username" type="text" maxlength="50" />
<!--                            --><?php //if (isset($validationResult) && $validationResult->hasError('username')): ?>
<!--                                <div class="validation-error-message">-->
<!--                                    --><?php //echo $validationResult->getErrorMessage('username'); ?>
<!--                                </div>-->
<!--                            --><?php //endif; ?>
                        </div>
                        <div class="form-row">
                            <label for="password">Password</label><br/>
                            <input id="password" name="password" type="password" maxlength="50" />
<!--                            --><?php //if (isset($validationResult) && $validationResult->hasError('password')): ?>
<!--                                <div class="validation-error-message">-->
<!--                                    --><?php //echo $validationResult->getErrorMessage('password'); ?>
<!--                                </div>-->
<!--                            --><?php //endif; ?>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once('includes/document-end.php'); ?>
