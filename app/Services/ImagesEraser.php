<?php

namespace App\Services;

class ImagesEraser
{
    public function delete(string $name){
        \Illuminate\Support\Facades\File::delete(storage_path("uploads/").'\\'.$name);
    }
}