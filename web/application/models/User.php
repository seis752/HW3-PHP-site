<?php

class User {

    protected $id;
    protected $username;
    protected $displayName;

    public static function create($array)
    {
        $user = new User();
        $user->id = $array['id'];
        $user->username = $array['username'];
        $user->displayName = $array['display_name'];

        return $user;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

}
