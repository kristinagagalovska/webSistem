<?php

namespace App\Repositories;

use App\Advertisement;

class DataBaseImagesRepository implements ImagesRepositoryInterface
{
    public function store($image)
    {
        $image->save();
    }
}