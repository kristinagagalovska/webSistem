<?php

namespace App\Repositories;


interface UsersRepositoryInterface
{
    public function all();
    
    public function find($id);
    
    public function store($user);
    
    public function delete($id);
}