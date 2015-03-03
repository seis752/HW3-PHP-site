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
    /**
     * Gets all friends in relationships table
     */
    public function getFriends(){
        $this->db_connection = new DBPDO();
        $user_name = $_SESSION["user_name"];
        $query = "select * from relationships r  WHERE r.username = '" . $user_name . "';";
        $friends  =$this->db_connection->fetchAll($query);
        return $friends;
    }

    public function getUserName($user_name) {
        $this->db_connection = new DBPDO();
        print $user_name;
        $query = "select * from users m  WHERE m.user_name = '" . $user_name . "';";
        $user = $this->db_connection->fetch($query);
        return $user['user_name'];

    }
}