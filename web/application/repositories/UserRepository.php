<?php

class UserRepository {

    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $users = [];

        $result = $this->db->query("SELECT * FROM user");

        $rows = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($rows as $row)
        {
            array_push($users, User::create($row));
        }

        return $users;
    }

//    public function findById($id)
//    {
//        $user = null;
//
//        $result = $this->db->query(sprintf("SELECT * FROM user WHERE user.id = %d", $id));
//
//        $row = $result->fetch_array(MYSQLI_ASSOC);
//
//        $user = User::create($row);
//
//        return $user;
//    }

    public function findByUsername($username)
    {
        $user = null;

        $result = $this->db->query(sprintf("SELECT * FROM user WHERE user.username = '%s'", $username));

        $row = $result->fetch_array(MYSQLI_ASSOC);

        $user = User::create($row);

        return $user;
    }

    public function findFriends($userId)
    {
        $users = [];

        $query = sprintf("SELECT u2.id, u2.username, u2.display_name
            FROM user u1
            INNER JOIN relationship r ON r.user_1_id = u1.id
            INNER JOIN user u2 ON u2.id = r.user_2_id
            WHERE u1.id = %d", $userId);

        $result = $this->db->query($query);

        $rows = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($rows as $row) {
            array_push($users, User::create($row));
        }

        return $users;
    }

}
