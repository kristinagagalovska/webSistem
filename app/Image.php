<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    public function setImage(string $image)
    {
        $this->setAttribute('file', $image);
    }
    
    public function setAdvertisementId(int $advertisementId)
    {
        $this->setAttribute('advertisement_id', $advertisementId);
    }
    
    public function getImage(string $image)
    {
        $this->getAttribute('file', $image);
    }
    
    public function getAdvertisementId(int $advertisementId)
    {
        $this->getAttribute('advertisement_id', $advertisementId);
    }

    public function advertisement() : BelongsTo
    {
        return $this->belongsTo(Advertisement::class, 'advertisement_id');
    }

}