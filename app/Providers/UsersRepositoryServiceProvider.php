<?php

namespace App\Providers;

use App\Repositories\DataBaseUsersRepository;
use App\Repositories\UsersRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class UsersRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UsersRepositoryInterface::class,
            DataBaseUsersRepository::class
        );
    }
}