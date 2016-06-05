<?php

namespace App\Handlers\Commands;

use App\Commands\CreateImageCommand;
use App\Image;
use App\Repositories\ImagesRepositoryInterface;
use App\Services\ImagesUploader;

class CreateImageCommandHandler
{
    public function __construct(ImagesRepositoryInterface $images, ImagesUploader $imagesUploader)
    {
        $this->images = $images;
        $this->imagesUploader = $imagesUploader;
    }

    public function handle(CreateImageCommand $command)
    {
        $image = new Image();
        
        $file = $this->imagesUploader->upload($command->getImage());
        $image->setImage($file->getFilename());
        
        $image->setAdvertisementId($command->getAdvertisementId());
        $this->images->store($image);
    }

}