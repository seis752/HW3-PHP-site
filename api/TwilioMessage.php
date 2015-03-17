<?php

class TwilioMessage {
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
            $_SESSION['tmessage'] = $_POST['tmessage'];
            $this->createMessage();
        }
    }

    public function createMessage()
    {
        $this->db_connection = new DBPDO();
        $memo = $_SESSION['tmessage'];
        $from = $_SESSION['twilioFrom'];
        $this->db_connection->execute(
            "insert into twilio (memo, fromnum) values ('$memo', '$from')");

    }

    public function getAllTwilioMessages()
    {
        $this->db_connection = new DBPDO();
        $query = "select * from twilio t order by ts DESC;";
        $messages = $this->db_connection->fetchAll($query);
        return $messages;
    }
}