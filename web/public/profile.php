<?php

require_once('../application/bootstrap.php');

$userService = new UserService(new Database());

$title = 'Profile';

session_start();

AuthenticationService::check();

$currentUser = $userService->fetchCurrentUser();

$user = $currentUser;

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['uid']))
    {
        $selectedUser = $userService->findById($_GET['uid']);

        if ($selectedUser != null)
        {
            $user = $selectedUser;
        }
    }
}

$friends = $userService->findFriends($user->getId());

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
            <li><a href="profile.php?uid=<?php echo $user->getId(); ?>"><?php echo $user->getDisplayName(); ?></a></li>
        <?php endforeach ?>
    </ul>
    <?php endif; ?>
</div>

<div>
    <h2>Post Message</h2>
    <form action="profile.php" method="post">
        <textarea id="message" name="message"></textarea>
        <button type="submit">Submit</button>
    </form>
</div>

<div>
    <h2>Messages</h2>
    <ul>
        <li>message</li>
        <li>message</li>
        <li>message</li>
    </ul>
</div>

<?php require_once('includes/document-end.php'); ?>
