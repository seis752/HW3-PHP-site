<?php

function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if (strpos($current_file_name,$requestUri)!==false)
        echo 'class="active"';
}
?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">HW4</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php echoActiveClassIfRequestMatches("messages") ?>>
                    <a href="messages.php">Messages
                    </a>
                </li>
                <li <?php echoActiveClassIfRequestMatches("users") ?>>
                    <a href="users.php">Users</a>
                </li>
                <li>
                <li><a href="search_xml.php">Search AJAX</a></li>
                </li>
                <li>
                    <li><a href="search_ajax.php">Search AJAX 2</a></li>
                </li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?logout">Log Out</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <?php echo $_SESSION['user_email']; ?>
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Messages</a></li>

                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
