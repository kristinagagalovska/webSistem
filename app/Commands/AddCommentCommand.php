<?php

namespace App\Commands;

class AddCommentCommand
{
    public function __construct($author, $advertisementId, $content)
    {
        $this->content = $content;
        $this->author = $author;
        $this->advertisementId = $advertisementId;
    }

    public function getContent() : string
    {
        return $this->content;
    }

    public function getAuthor() 
    {
        return $this->author;
    }

    public function getAdvertisementId() : int
    {
        return $this->advertisementId;
    }
}