<?php

namespace App\Http\Controllers;

use App\Services\ImagesResolver;

class ImagesController extends Controller
{
    public function show(string $filename) 
    {
        $images = new ImagesResolver();
        return $images->get($filename);
    }
}