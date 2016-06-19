<?php

namespace App\Repositories;


interface UsersRepositoryInterface
{
    public function all();
    
    public function delete($id);
}