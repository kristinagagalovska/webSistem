<?php

namespace App\Repositories;

use App\Comment;

class DataBaseCommentsRepositoryInterface implements CommentsRepositoryInterface
{
    public function store(Comment $comment)
    {
        $comment->save();
    }
}