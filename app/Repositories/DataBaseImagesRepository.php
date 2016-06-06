<?php

namespace App\Repositories;

use App\Advertisement;
use App\Image;

class DataBaseImagesRepository implements ImagesRepositoryInterface
{
    public function store($image)
    {
        $image->save();
    }

    public function find($advertisementId)
    {
        $images = Image::where('advertisement_id', '=', $advertisementId)->get();

        return $images;
    }
}