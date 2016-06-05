<?php

namespace App\Commands;

class CreateImageCommand
{
    public function __construct($image, $advertisementId)
    {
        $this->image = $image;
        $this->advertisementId = $advertisementId;
    }
    
    public function getImage()
    {
        return $this->image;
    }
    
    public function getAdvertisementId()
    {
        return $this->advertisementId;
    }
}