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
    
    public function delete($id)
    {
        Image::destroy($id);
    }
    
    public function getById($id)
    {
        dd(Image::find($id));
        $image = Image::find($id);
        return $image;
    }
}