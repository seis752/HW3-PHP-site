<?php

class AuthenticationService
{
    public static function authenticate($username, $password)
    {
        // TODO: Replace with database query.
        if (($username == 'user1') && ($password == 'password'))
        {
            $_SESSION['isAuthenticated'] = true;
            // TODO: Add "id" to session data.
            $_SESSION['username'] = $username;
            return true;
        }

        return false;
    }

    public static function deauthenticate()
    {
        session_unset();
        session_destroy();
    }

    public static function check()
    {
        if (!AuthenticationService::isAuthenticated())
        {
            header('Location: index.php');
        }
    }

    public static function isAuthenticated()
    {
        if (isset($_SESSION['isAuthenticated']) && ($_SESSION['isAuthenticated'] == true))
        {
            return true;
        }

        return false;
    }

}
