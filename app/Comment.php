<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    public function setContent(string $content)
    {
        $this->setAttribute('content', $content);
    }

    public function setAuthor(int $user_id)
    {
        //$this->author()->associate($user);
        $this->setAttribute('user_id', $user_id);
    }

    public function setAdvertisementId(int $advertisement_id)
    {
        $this->setAttribute('advertisement_id', $advertisement_id);
    }

    public function getContent() : string
    {
        return $this->getAttribute('content');
    }

    public function getAuthor() 
    {
        //return $this->author;
        return $this->getAttribute('user_id');
    }

    public function getAdvertisementId() : int
    {
        return $this->getAttribute('advertisement_id');
    }
    
    public function advertisement() : BelongsTo
    {
        return $this->belongsTo(Advertisement::class);
    }
    
    public function author() : BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

}