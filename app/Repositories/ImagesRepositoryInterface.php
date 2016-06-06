<?php

namespace App\Repositories;

interface ImagesRepositoryInterface
{
    public function store($image);
    
    public function find($advertisementId);
}