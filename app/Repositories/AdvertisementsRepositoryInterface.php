<?php

namespace App\Repositories;

interface AdvertisementsRepositoryInterface
{
    public function store($advertisement);

    public function all();

    public function find($id);

    public function delete($id);
    
    public function searchByTypeCategoryTown($type, $category, $town);

    public function searchByCategoryTown($category, $town);
    
    public function searchByTypeCategory($type, $category);
    
    public function searchByTypeTown($type, $town);
    
    public function searchByType($type);
    
    public function searchByCategory($category);
    
    public function searchByTown($town);

    public function lastAdvertisement();
    
    public function findMy($id);

}