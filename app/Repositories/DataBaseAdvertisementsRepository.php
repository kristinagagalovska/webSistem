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
        $advertisements = Advertisement::orderBy('created_at', 'asc')->get();

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

    public function searchByTypeCategoryTown($type, $category, $town)
    {
        $advertisements = Advertisement::where('type', '=', $type)
            ->where('category', '=', $category)
            ->where('town', '=', $town)
            ->get()
            ->all();
        
        return $advertisements;
    }

    public function searchByCategoryTown($category, $town)
    {
        $advertisements = Advertisement::where('category', '=', $category)
            ->where('town', '=', $town)
            ->get()
            ->all();

        return $advertisements;
    }

    public function searchByTypeCategory($type, $category)
    {
        $advertisements = Advertisement::where('category', '=', $category)
            ->where('type', '=', $type)
            ->get()
            ->all();

        return $advertisements;
    }

    public function searchByTypeTown($type, $town)
    {
        $advertisements = Advertisement::where('town', '=', $town)
            ->where('type', '=', $type)
            ->get()
            ->all();

        return $advertisements;
    }

    public function searchByType($type)
    {
        $advertisements = Advertisement::where('type', '=', $type)
            ->get()
            ->all();

        return $advertisements;
    }

    public function searchByTown($town)
    {
        $advertisements = Advertisement::where('town', '=', $town)
            ->get()
            ->all();

        return $advertisements;
    }

    public function searchByCategory($category)
    {
        $advertisements = Advertisement::where('category', '=', $category)
            ->get()
            ->all();

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