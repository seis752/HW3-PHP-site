<?php

class Message
{
    protected $id;
    protected $userId;
    protected $content;
    protected $posterId;
    protected $posterDisplayName;

    public static function create($array)
    {
        $message = new Message();
        $message->id = $array['id'];
        $message->userId = $array['user_id'];
        $message->content = $array['message'];
        $message->posterId = $array['created_by'];
        $message->posterDisplayName = $array['display_name'];

        return $message;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getPosterId()
    {
        return $this->posterId;
    }

    public function getPosterDisplayName()
    {
        return $this->posterDisplayName;
    }
}
