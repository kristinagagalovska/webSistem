<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class ImagesResolver
{
    public function get(string $filename) : \Illuminate\Http\Response
    {
        $path = storage_path('uploads') . '/' . $filename;

        if(!File::exists($path)) abort(404);
        
        $file = File::get($path);

        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        
        return $response;
    }
}