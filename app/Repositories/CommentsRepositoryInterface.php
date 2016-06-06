<?php

namespace App\Repositories;

use App\Comment;

interface CommentsRepositoryInterface
{
    public function store(Comment $comment);

}