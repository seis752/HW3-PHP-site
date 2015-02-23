<?php

require_once('../application/bootstrap.php');

$userService = new UserService(new Database());
$messageService = new MessageService(new Database());

$title = 'Profile';

session_start();

AuthenticationService::check();

$currentUser = $userService->fetchCurrentUser();

$user = $currentUser;

// Handle "post message" action.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $messageService->postMessage($_POST['user_id'], $_POST['message'], $currentUser->getId());

    $selectedUser = $userService->findById($_POST['user_id']);

    if ($selectedUser != null)
    {
        $user = $selectedUser;
    }
}

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

$messages = $messageService->findMessages($user->getId());

?>
<?php require_once('includes/document-start.php'); ?>
<?php require_once('includes/navigation.php'); ?>

<div class="container">
    <div>
<h1>Profile</h1>
<div><?php echo $user->getDisplayName(); ?></div>

<div>
    <h2>Friends</h2>
    <?php if (isset($friends)): ?>
    <ul>
        <?php foreach ($friends as $friend) : ?>
            <li><a href="profile.php?uid=<?php echo $friend->getId(); ?>"><?php echo $friend->getDisplayName(); ?></a></li>
        <?php endforeach ?>
    </ul>
    <?php endif; ?>
</div>

<div>
    <h2>Post Message</h2>
    <form action="profile.php" method="post">
        <input type="hidden" name="user_id" value="<?php echo $user->getId(); ?>" />
        <textarea id="message" name="message"></textarea>
        <button type="submit">Submit</button>
    </form>
</div>

<div>
    <h2>Messages</h2>
    <ul>
        <?php foreach ($messages as $message) : ?>
            <li>
                <div><?php echo $message->getContent(); ?></div>
                <div><a href="profile.php?uid=<?php echo $message->getPosterId(); ?>"><?php echo $message->getPosterDisplayName(); ?></a></div>
            </li>
        <?php endforeach ?>
    </ul>
</div>
    </div>
</div>

<?php require_once('includes/document-end.php'); ?>
