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
        $advertisements = Advertisement::where('type', '=', $type)
            ->Where('category', '=', $category)
            ->Where('town', '=', $town)
            ->get()
            ->toArray();

        return $advertisements;
    }

    public function lastAdvertisement()
    {
        $advertisement = Advertisement::orderBy('created_at', 'desc')->first();
        
        return $advertisement;
    }

    public function findMy($id)
    {
        $advertisements = Advertisement::where('user_id', '=', $id)->get();
        
        return $advertisements;
    }
}