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

<h1>Friends</h1>
<ul>
    <?php foreach ($friends as $user) : ?>
        <li>
            <a href="profile.php?uid=<?php echo $user->getId(); ?>"><?php echo $user->getDisplayName(); ?></a>
            &nbsp;
            <a href="friends.php?fid=<?php echo $user->getId(); ?>">Remove</a>
        </li>
    <?php endforeach ?>
</ul>

<?php require_once('includes/document-end.php'); ?>
