<?php
/**
 * User: Warsame-Bashir
 */

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



    function __construct() {

    }

    /**
     * Gets all users from users table
     */
    public function getAllUsers()
    {
            $this->db_connection = new DBPDO();

            $query = "select * from users;";
            $users  =$this->db_connection->fetchAll($query);

            return $users;

    }
}