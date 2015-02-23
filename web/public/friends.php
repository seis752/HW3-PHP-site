<?php

require_once('../application/bootstrap.php');

$userService = new UserService(new Database());

$title = 'Friends';

session_start();

AuthenticationService::check();

$currentUser = $userService->fetchCurrentUser();

// Handle "remove friend" action.
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['fid']))
    {
        $userService->removeFriend($currentUser->getId(), $_GET['fid']);
    }
}

$friends = $userService->findFriends($currentUser->getId());

?>
<?php require_once('includes/document-start.php'); ?>
<?php require_once('includes/navigation.php'); ?>

<div class="container">
    <h1><?php echo $currentUser->getDisplayName(); ?> : Friends</h1>

    <div class="col-md-6">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($friends as $user) : ?>
                <tr>
                    <td>
                        <a href="profile.php?uid=<?php echo $user->getId(); ?>"><?php echo $user->getDisplayName(); ?></a>
                    </td>
                    <td>
                        <a href="friends.php?fid=<?php echo $user->getId(); ?>">Remove</a>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once('includes/document-end.php'); ?>
