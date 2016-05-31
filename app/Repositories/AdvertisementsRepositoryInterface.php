<?php

namespace App\Repositories;

interface AdvertisementsRepositoryInterface
{
    public function store($advertisement);

    public function all();

    public function find($id);

}