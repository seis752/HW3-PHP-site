<?php

require_once('../application/bootstrap.php');

$title = 'Profile';

session_start();

AuthenticationService::check();

$userRepository = new UserRepository(new Database());

$user = $userRepository->findByUsername($_SESSION['username']);

$friends = $userRepository->findFriends($user->getId());

?>
<?php require_once('includes/document-start.php'); ?>
<?php require_once('includes/navigation.php'); ?>

<h1>Profile</h1>
<div><?php echo $user->getDisplayName(); ?></div>

<div>
    <h2>Friends</h2>
    <?php if (isset($friends)): ?>
    <ul>
        <?php foreach ($friends as $user) : ?>
            <li><?php echo $user->getDisplayName(); ?></li>
        <?php endforeach ?>
    </ul>
    <?php endif; ?>
</div>

<div>
    <h2>Messages</h2>
    <ul>
        <li>message</li>
        <li>message</li>
        <li>message</li>
    </ul>
</div>

<div>
    <h2>Post Message</h2>
    <form action="profile.php" method="post">
        <textarea id="message" name="message"></textarea>
        <button type="submit">Submit</button>
    </form>
</div>

<?php require_once('includes/document-end.php'); ?>
