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

    public function find($id)
    {
        $advertisement = Advertisement::find($id);

        return $advertisement;
    }

    public function delete($id)
    {
        Advertisement::destroy($id);
    }

    public function search($type, $category, $town)
    {
        $topics = Advertisement::where('type', '=', $type)
            ->orWhere('category', '=', $category)
            ->orWhere('town', '=', $town)
            ->get()
            ->toArray();

        return $topics;
    }
}