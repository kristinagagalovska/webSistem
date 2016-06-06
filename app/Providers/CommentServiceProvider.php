<?php

namespace App\Providers;

use App\Repositories\CommentsRepositoryInterface;
use App\Repositories\DataBaseCommentsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            CommentsRepositoryInterface::class,
            DataBaseCommentsRepositoryInterface::class
        );
    }
}