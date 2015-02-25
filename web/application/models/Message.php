<?php

class Message
{
    protected $id;
    protected $userId;
    protected $content;
    protected $posterId;
    protected $posterDisplayName;
    protected $createdWhen;

    public static function create($array)
    {
        $message = new Message();
        $message->id = $array['id'];
        $message->userId = $array['user_id'];
        $message->content = $array['message'];
        $message->posterId = $array['created_by'];
        $message->posterDisplayName = $array['display_name'];
        $message->createdWhen = $array['created_when'];

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

    public function getCreatedWhen()
    {
        return $this->createdWhen;
    }

    public function getDisplayCreatedWhen()
    {
        $dateTime = new DateTime($this->createdWhen);
        return $dateTime->format('D, F j, Y g:i a');
    }
}
