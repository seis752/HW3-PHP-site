<?php

require_once('../application/bootstrap.php');

$title = 'Friends';

session_start();

AuthenticationService::check();

$userService = new UserService(new Database());

$user = $userService->findByUsername($_SESSION['username']);

// Handle "remove friend" action.
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['fid']))
    {
        $userService->removeFriend($user->getId(), $_GET['fid']);
    }
}

$friends = $userService->findFriends($user->getId());

?>
<?php require_once('includes/document-start.php'); ?>
<?php require_once('includes/navigation.php'); ?>

<h1>Friends</h1>
<ul>
    <?php foreach ($friends as $user) : ?>
        <li>
            <?php echo $user->getDisplayName(); ?>
            &nbsp;
            <a href="friends.php?fid=<?php echo $user->getId(); ?>">Remove</a>
        </li>
    <?php endforeach ?>
</ul>

<?php require_once('includes/document-end.php'); ?>
