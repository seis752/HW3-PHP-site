<?php

require_once('../application/bootstrap.php');

$title = 'Friends';

session_start();

AuthenticationService::check();

$userRepository = new UserRepository(new Database());
$users = $userRepository->findAll();

?>
<?php require_once('includes/document-start.php'); ?>
<?php require_once('includes/navigation.php'); ?>

<h1>Friends</h1>
<ul>
    <?php foreach ($users as $user) : ?>
        <li>
            <?php echo $user->getDisplayName(); ?>
            &nbsp;
            <a href="friends.php">Remove</a>
        </li>
    <?php endforeach ?>
</ul>

<?php require_once('includes/document-end.php'); ?>
