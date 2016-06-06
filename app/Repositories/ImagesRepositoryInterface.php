<?php

namespace App\Repositories;

interface ImagesRepositoryInterface
{
    public function store($image);
    
    public function find($advertisementId);
    
    public function delete($id);
    
    public function getById($id);
}