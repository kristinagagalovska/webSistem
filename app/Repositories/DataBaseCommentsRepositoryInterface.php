<?php

namespace App\Repositories;

use App\Comment;

class DataBaseCommentsRepositoryInterface implements CommentsRepositoryInterface
{
    public function store(Comment $comment)
    {
        $comment->save();
    }
    
    public function find($id)
    {
        $comments = Comment::where('advertisement_id', '=', $id)->get();
        return $comments;
    }
}