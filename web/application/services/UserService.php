<?php

class UserService {

    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function fetchCurrentUser()
    {
        return $this->findById($_SESSION['userId']);
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

    public function findById($id)
    {
        $user = null;

        $result = $this->db->query(sprintf("SELECT * FROM user WHERE user.id = %d", $id));

        $row = $result->fetch_array(MYSQLI_ASSOC);

        $user = User::create($row);

        return $user;
    }

    public function findByUsername($username)
    {
        $user = null;

        $result = $this->db->query(sprintf("SELECT * FROM user WHERE user.username = '%s'", $username));

        $row = $result->fetch_array(MYSQLI_ASSOC);

        var_dump($row);
        if ($row != null) {
            $user = User::create($row);
        }

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

    public function checkHasFriend($userId, $friendId)
    {
        $hasFriend = false;

        $friends = $this->findFriends($userId);

        foreach ($friends as $friend)
        {
            if ($friend->getId() == $friendId)
            {
                $hasFriend = true;
            }
        }

        return $hasFriend;
    }

    /**
     * TODO: Could be 1 insert if the query to find user's friends isn't
     * dependent on which user column represents user and friend.
     */
    public function addFriend($userId, $friendId)
    {
        // INSERT the record to relate the "friend" to the "user".
        $query = sprintf("INSERT INTO `relationship` (`user_1_id`, `user_2_id`) VALUES (%d, %d);", $userId, $friendId);
        $result = $this->db->query($query);

        // INSERT the record to relate the "user" to the "friend".
        $query = sprintf("INSERT INTO `relationship` (`user_1_id`, `user_2_id`) VALUES (%d, %d);", $friendId, $userId);
        $result = $this->db->query($query);

        // TODO: Add logic to verify success of the database operations.
        return true;
    }

    public function removeFriend($userId, $friendId)
    {
        // DELETE the record relating the "friend" to the "user".
        $query = sprintf("DELETE FROM `relationship` WHERE `user_1_id` = %d AND `user_2_id` = %d;", $userId, $friendId);
        $result = $this->db->query($query);

        // DELETE the record relating the "user" to the "friend".
        $query = sprintf("DELETE FROM `relationship` WHERE `user_1_id` = %d AND `user_2_id` = %d;", $friendId, $userId);
        $result = $this->db->query($query);

        // TODO: Add logic to verify success of the database operations.
        return true;
    }

    public function register($username, $password, $displayName)
    {
        $user = $this->findByUsername($username);

        if ($user == null)
        {
            $query = sprintf("INSERT INTO user (username, password, display_name, created_when) VALUES ('%s', '%s', '%s', now())", $username, $password, $displayName);
            $result = $this->db->query($query);

            return true;
        }

        return false;
    }

}
