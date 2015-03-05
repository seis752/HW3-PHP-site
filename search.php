<?php
include 'core/init.php';
require_once("api/User.php");
$user = new User();


 ?>
<tr>
            <th>User Id</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Display Name</th>

        </tr>
 <tr>
 <td>
 <?php $query = $_GET['query'];
    $results = $user->searchUser($query);
    if (!empty($query)) {
        // show search
        echo $results;
    }?>
 </td>
 </tr>