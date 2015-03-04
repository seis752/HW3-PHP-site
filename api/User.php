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

    public $username = null;

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
    public function getFriends($user_name){
        $this->db_connection = new DBPDO();
        if (empty($user_name)) {
            $user_name = $_SESSION["user_name"];
        }
        $query = "select * from relationships r  WHERE r.username = '" . $user_name . "';";
        $friends  =$this->db_connection->fetchAll($query);
        return $friends;
    }

    /**
     * @param $user_name
     * @return mixed username property
     */
    public function getUserName($user_name) {
        $this->db_connection = new DBPDO();
        $query = "select * from users m  WHERE m.user_name = '" . $user_name . "';";
        $user = $this->db_connection->fetch($query);
        return $user['user_name'];

    }

    /**
     * Add friend
     */
    public function addFriend($friend_id){
        $this->db_connection = new DBPDO();
        $user_name = $_SESSION["user_name"];
        $check_query = "select * from relationships where friend = '$friend_id'";
        $results = $this->db_connection->fetchAll($check_query);
        if(!empty($results)){
            // freind already exists
            echo '<h4> Friend Already Exists </h4>';
        }else{
            $query = "insert into relationships  (username, friend ) values ('$user_name', '$friend_id')";
            $this->db_connection->execute($query);
            redirect("users.php");
        }

    }

    /**
     * Delete friend
     */
    public function deleteFriend($friend_username){
        $this->db_connection = new DBPDO();
        $query = "delete from relationships  where friend = '" . $friend_username . "';";
        $check_query = "select * from relationships where friend = '$friend_username'";
        $results = $this->db_connection->fetchAll($check_query);
        if(empty($results)){
            // freind already exists
            echo '<h4> Cannot delete a none existing friend </h4>';
        }
        else{
            $this->db_connection->execute($query);
            redirect("users.php");
        }

    }
}