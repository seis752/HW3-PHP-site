<?php
include 'core/init.php';
include 'views/common/header.php';
protect_page();

require_once("api/User.php");

$action = $_GET['action'];
$id = $_GET['id'];
$query = $_GET['query'];
$min_length = 3;
$user = new User();

if ($action === "addFriend") {
    // add friend

    $user->addFriend($id);

}

if ($action === "deleteFriend") {
    // delete friend
    $user->deleteFriend($id);

}
// if query length is greater than $min_length
if (strlen($query) >= $min_length) {
    // delete friend
    $user->searchUser($query);

}

function printUsers()
{

    // create the registration object
    $user = new User();
    $users = $user->getAllUsers();
    if (sizeof($users) <= 0) {
        echo "<td align=center colspan=4>No users found</td>";
        return;
    }

    $currentId = $_SESSION['user_id'];
    foreach ($users as $u) {
        echo "<tr>
            <td>{$u['user_id']}</td>
            <td>{$u['user_name']}</td>
            <td>{$u['user_email']}</td>
            <td>{$u['display_name']}</td>

        ";
        // Can't delete or add your self
        if ($currentId != $u['user_id']) {
            echo "<td>

                    <a href='users.php?action=deleteFriend&id={$u['user_name']}' class='btn btn-danger'>
                        Delete Friend</a>
                    </td>

                    <td>

                        <a href='users.php?action=addFriend&id={$u['user_name']}' class='btn btn-success'>Add Friend</a>

                    </td>";


        }
        echo "</tr>";
    }
}

?>
<section class="search-holder text-center">
    <form action="users.php" method="GET" class="search-form">
        <input type="text" name="query" class="search-input"/>
        <input type="submit" value="Search" name="searchUser" class="search-button" />
    </form>
    <div class="text-center">
        <?php $results = $user->searchUser($query);
                echo $results;?>
    </div>
</section>
<section class="users-list">
    <hr>
    <h3>All Users</h3>
    <br>
    <table width='50%' class="table ">
        <tr>
            <th>User Id</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Display Name</th>

        </tr>
        <?php printUsers(); ?>

    </table>

</section>

<section class="friends-holder">
    <hr>
    <h3>Friends</h3>
    <br>
    <ul class="friends-list col-md-4">
        <?php
        $userInst = new User();
        $friends = $userInst->getFriends(null);
        foreach ($friends as $f) { ?> <!-- We start our foreach loop. -->
            <li>
                <div class="friend-content">
                    <h4 class="col-md-4">
                    <span>
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
                        &nbsp;
                        <?php echo $f['friend']; ?>
                    </h4>
                    <a class="btn btn-primary" href='messages.php'>Send a Message</a>
                </div>

            </li>
        <?php } ?> <!-- We end our foreach loop.
    </ul>
</section>
<?php include 'views/common/footer.php' ?>

