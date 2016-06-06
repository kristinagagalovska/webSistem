<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class ImagesUploader
{
    protected $directory;

    public function __construct()
    {
        $this->directory = storage_path("uploads/");
    }

    public function getDirectory() : string
    {
        return $this->directory;
    }

    public function setDirectory($directory)
    {
        $this->directory = $directory;
    }

    public function upload(UploadedFile $image) : \Symfony\Component\HttpFoundation\File\File
    {
        $extension = $image->getClientOriginalExtension(); // getting image extension
        $fileName = rand(11111, 99999) . '.' . $extension;

        $image = $image->move($this->directory, $fileName);

        return $image;

    }
}