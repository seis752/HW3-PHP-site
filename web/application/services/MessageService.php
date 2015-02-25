<?php

class MessageService {

    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function postMessage($userId, $message, $posterId)
    {
        $query = sprintf("INSERT INTO `message` (`user_id`, `message`, `created_by`, `created_when`) VALUES (%d, '%s', %d, now());", $userId, $message, $posterId);

        $result = $this->db->query($query);

        // TODO: Add logic to verify success of the database operations.
        return true;
    }

    public function findMessages($userId)
    {
        $messages = [];

        $query = sprintf("SELECT m.id, m.user_id, m.message, m.created_by, u.display_name
            FROM message m
            INNER JOIN user u ON u.id = m.created_by
            WHERE m.user_id = %d", $userId);

        $result = $this->db->query($query);

//        $rows = $result->fetch_all(MYSQLI_ASSOC);
//        $rows = $result->fetch_assoc();
//
//        foreach ($rows as $row) {
//            array_push($messages, Message::create($row));
//        }

        while ($row = $result->fetch_assoc())
        {
            array_push($messages, Message::create($row));
        }

        return $messages;
    }

}
