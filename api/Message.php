<?php
/**
 * Created by PhpStorm.
 * User: Warsame-Bashir
 * Date: 3/3/15
 * Time: 9:58 AM
 */

class Message {
    /**
     * @var object The database connection
     */
    private $db_connection = null;

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     *
     */
    public function __construct()
    {
        if (isset($_POST["createMessage"])) {
            $_SESSION['friend'] = $_POST['friends_list'];
            $_SESSION['message'] = $_POST['message'];
            $this->createMessage();
        }
    }

    public function getMyMessages(){
        $this->db_connection = new DBPDO();
        $user_name = $_SESSION["user_name"];

        $query = "select * from messages m  WHERE m.username = '" . $user_name . "' order by date DESC;";
        $messages  =$this->db_connection->fetchAll($query);
        return $messages;
    }

    private function createMessage(){
        $this->db_connection = new DBPDO();
        $friend = $_SESSION['friend'];
        $message = $_SESSION['message'];
        $this->db_connection->execute(
            "insert into messages (username, message) values ('$friend', '$message')");
    }
}