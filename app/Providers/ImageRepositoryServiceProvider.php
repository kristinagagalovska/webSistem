<?php

namespace App\Providers;

use App\Repositories\DataBaseImagesRepository;
use App\Repositories\ImagesRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ImageRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            ImagesRepositoryInterface::class,
            DataBaseImagesRepository::class
        );
    }

}