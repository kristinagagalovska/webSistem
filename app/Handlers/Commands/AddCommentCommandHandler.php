<?php

namespace App\Handlers\Commands;

use App\Commands\AddCommentCommand;
use App\Comment;
use App\Repositories\CommentsRepositoryInterface;

class AddCommentCommandHandler
{
    public function __construct(CommentsRepositoryInterface $comments)
    {
        $this->comments = $comments;
    }

    public function handle(AddCommentCommand $command)
    {
        $comment = new Comment();
        $comment->setContent($command->getContent());
        $comment->setAdvertisementId($command->getAdvertisementId());
        $comment->setAuthor($command->getAuthor());

        $this->comments->store($comment);
    }
}