<?php

require_once('../application/bootstrap.php');

$title = 'Users';

session_start();

AuthenticationService::check();

$userService = new UserService(new Database());

$currentUser = $userService->findByUsername($_SESSION['username']);

// TODO: Refactor to "loadFriends()", to contain this within UserService?
// Get current user's friends list.
$currentUserFriends = $userService->findFriends($currentUser->getId());
$currentUser->setFriends($currentUserFriends);

$users = $userService->findAll();

?>
<?php require_once('includes/document-start.php'); ?>
<?php require_once('includes/navigation.php'); ?>

<h1>Users</h1>
<ul>
<?php foreach ($users as $user) : ?>
    <li>
        <?php echo $user->getDisplayName(); ?>
        &nbsp;

        <?php if ($currentUser->getId() == $user->getId()): ?>
            is you
        <?php elseif ($currentUser->isFriend($user->getId())): ?>
            is friend
        <?php else: ?>
            <form action="users.php" method="post">
                <button type="submit">Add</button>
            </form>
        <?php endif; ?>

    </li>
<?php endforeach ?>
</ul>

<?php require_once('includes/document-end.php'); ?>
