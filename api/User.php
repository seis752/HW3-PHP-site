<?php
/**
 * User: Warsame-Bashir
 */
require_once ('config/MysqliDB.php');

class User {

    /**
     * @var object The database connection
     */
    private $db_connection = null;


    /**
     * @var array Collection of error messages
     */
    public $errors = array();


    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * Gets all users from users table
     */
    public function getAllUsers()
    {
        // create a database connection
        $this->db_connection = new MysqliDb (DB_HOST, DB_USER, DB_PASS, DB_NAME);
        // change character set to utf8 and check it
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno) {
            $sql = "SELECT * FROM users";
            $users = $this->db_connection->get('users');

            return $users;
        }
        else {
            $this->errors[] = "Sorry, no database connection.";
        }
    }
}