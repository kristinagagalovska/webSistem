<?php

namespace App\Providers;

use App\Repositories\AdvertisementsRepositoryInterface;
use App\Repositories\DataBaseAdvertisementsRepository;
use Illuminate\Support\ServiceProvider;

class AdvertisementRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            AdvertisementsRepositoryInterface::class,
            DataBaseAdvertisementsRepository::class
        );
    }

}