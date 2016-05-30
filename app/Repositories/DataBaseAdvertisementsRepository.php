<?php

namespace App\Repositories;

use App\Advertisement;

class DataBaseAdvertisementsRepository implements AdvertisementsRepositoryInterface
{
    public function store($advertisement)
    {
        $advertisement->save();
    }

    public function all()
    {
        $advertisements = Advertisement::all()->all();
        return $advertisements;
    }

}