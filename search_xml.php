<?php
include 'core/init.php';
include 'views/common/header.php';
protect_page();

?>


<section class="search-holder text-center">
    <form method="GET" class="search-form">
        <input type="text" name="query" placeholder="Search by username" class="search-input" id="searchInput"/>
        <button type="button" class="search-button" id="searchButtonXML" value="Search" onclick="searchXML()"> Search</button>
    </form>

</section>

<section class="users-list">
    <hr>
    <br>
    <table width='50%' class="table " id="usersList">
        <tr>
            <th>User Id</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Display Name</th>

        </tr>


    </table>

</section>