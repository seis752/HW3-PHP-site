
<?php
include 'core/init.php';
include 'views/common/header.php';

require_once("api/User.php");



function printUsers () {

    // create the registration object
    $user = new User();
    $users = $user->getAllUsers();
    if (sizeof($users) <= 0) {
        echo "<td align=center colspan=4>No users found</td>";
        return;
    }


    foreach ($users as $u) {
        echo "<tr>
            <td>{$u['user_id']}</td>
            <td>{$u['user_name']}</td>
            <td>{$u['user_email']} {$u['lastName']}</td>
            <td>
                <a href='index.php?action=rm&id={$u['id']}'>rm</a> ::
                <a href='index.php?action=mod&id={$u['id']}'>ed</a>
            </td>
        </tr>";
    }
}
?>

<table width='50%' class="table table-hover">
    <tr bgcolor='#cccccc'>
        <th>User Id</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Display Name</th>
    </tr>
    <?php printUsers();?>

</table>
<?php include 'views/common/footer.php'?>

