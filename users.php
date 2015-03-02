
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

	$currentId = $_SESSION['user_id'];
    foreach ($users as $u) {
        echo "<tr>
            <td>{$u['user_id']}</td>
            <td>{$u['user_name']}</td>
            <td>{$u['user_email']}</td>
            <td>{$u['display_name']}</td>
            <td>{$u['display_name']}</td>
            
        ";
		// Can't delete your self
		if ( $currentId != $u['user_id']){
			echo "<td>
				
                <a href='index.php?action=deleteUser&id={$u['user_id']}'>Delete</a>
               
            </td>
			
			<td>
				
                <a href='index.php?action=deleteUser&id={$u['user_id']}'>Add Friend</a>
               
            </td>";
		}
		echo "</tr>";
    }
}
?>

<table width='50%' class="table ">
    <tr >
        <th>User Id</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Display Name</th>
        
    </tr>
    <?php printUsers();?>

</table>
<?php include 'views/common/footer.php'?>

