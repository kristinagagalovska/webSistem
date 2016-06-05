<?php

namespace App\Commands;

class CreateAdvertisementCommand
{
    public function __construct(
        $title,
        $description,
        $type,
        $category,
        $address,
        $town,
        $price,
        $garage,
        $renovated,
        $new,
        $namesten,
        $userId
    ) {
        $this->title = $title;
        $this->description= $description;
        $this->type = $type;
        $this->category = $category;
        $this->address = $address;
        $this->town = $town;
        $this->price = $price;
        $this->garage = $garage;
        $this->renovated = $renovated;
        $this->new = $new;
        $this->namesten = $namesten;
        $this->userId = $userId;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function getType() : string
    {
        return $this->type;
    }

    public function getCategory() : string
    {
        return $this->category;
    }

    public function getAddress() : string
    {
        return $this->address;
    }

    public function getTown() : string
    {
        return $this->town;
    }

    public function getPrice() : string
    {
        return $this->price;
    }

    public function getGarage() : bool
    {
        return $this->garage;
    }

    public function isRenovated() : bool
    {
        return $this->renovated;
    }

    public function isNew() : bool
    {
        return $this->new;
    }

    public function isNamesten() : bool
    {
        return $this->namesten;
    }

    public function getAuthorId() : int
    {
        return $this->userId;
    }
}