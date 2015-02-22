<?php

require_once('../application/bootstrap.php');

$title = 'Friends';

session_start();

AuthenticationService::check();

$userRepository = new UserRepository(new Database());

$user = $userRepository->findByUsername($_SESSION['username']);

$friends = $userRepository->findFriends($user->getId());

?>
<?php require_once('includes/document-start.php'); ?>
<?php require_once('includes/navigation.php'); ?>

<h1>Friends</h1>
<ul>
    <?php foreach ($friends as $user) : ?>
        <li>
            <?php echo $user->getDisplayName(); ?>
            &nbsp;
            <a href="friends.php">Remove</a>
        </li>
    <?php endforeach ?>
</ul>

<?php require_once('includes/document-end.php'); ?>
