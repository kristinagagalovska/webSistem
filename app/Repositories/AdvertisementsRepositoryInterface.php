<?php

namespace App\Repositories;

interface AdvertisementsRepositoryInterface
{
    public function store($advertisement);

    public function all();

    public function find($id);

    public function delete($id);
    
    public function search($type, $category, $town);

    public function lastAdvertisement();
    
    public function findMy($id);

}