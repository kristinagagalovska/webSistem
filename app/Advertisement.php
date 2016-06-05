<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Advertisement extends Model
{
    public function setTitle(string $title)
    {
        $this->setAttribute('title', $title);
    }

    public function setDescription(string $description)
    {
        $this->setAttribute('description', $description);
    }

    public function setType(string $type)
    {
        $this->setAttribute('type', $type);
    }

    public function setCategory(string $category)
    {
        $this->setAttribute('category', $category);
    }

    public function setAddress(string $address)
    {
        $this->setAttribute('address', $address);
    }

    public function setTown(string $town)
    {
        $this->setAttribute('town', $town);
    }

    public function setPrice(string $price)
    {
        $this->setAttribute('price', $price);
    }

    public function setGarage(bool $garage)
    {
        $this->setAttribute('garage', $garage);
    }

    public function setRenovated(bool $renovated)
    {
        $this->setAttribute('renovated', $renovated);
    }

    public function setNew(bool $new)
    {
        $this->setAttribute('new', $new);
    }

    public function setNamesten(bool $namesten)
    {
        $this->setAttribute('namesten', $namesten);
    }

    public function setAuthorId(int $userId)
    {
        $this->setAttribute('user_id', $userId);
    }

    public function getTitle() : string
    {
        return $this->getAttribute('title');
    }

    public function getDescription() : string
    {
        return $this->getAttribute('description');
    }

    public function getType() : string
    {
        return $this->getAttribute('type');
    }

    public function getCategory() : string
    {
        return $this->getAttribute('category');
    }

    public function getAddress() : string
    {
        return $this->getAttribute('address');
    }

    public function getTown() : string
    {
        return $this->getAttribute('town');
    }

    public function getPrice() : string
    {
        return $this->getAttribute('price');
    }

    public function getGarage() : bool
    {
        return $this->getAttribute('garage');
    }

    public function isRenovated() : bool
    {
        return $this->getAttribute('renovated');
    }

    public function isNew() : bool
    {
        return $this->getAttribute('new');
    }

    public function isNamesten() : bool
    {
        return $this->getAttribute('namesten');
    }

    public function getAuthorId() : int
    {
        return $this->getAttribute('user_id');
    }
    
    public function getAdvertisementId() : int
    {
        return $this->getAttribute('id');
    }

    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function images() : HasMany
    {
        return $this->hasMany(Image::class);
    }
}