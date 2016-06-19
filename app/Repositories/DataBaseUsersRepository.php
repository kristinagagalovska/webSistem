<?php

namespace App\Repositories;

use App\User;

class DataBaseUsersRepository implements UsersRepositoryInterface
{
    public function all()
    {
        $users = User::all()->all();

        return $users;
    }
    
    public function delete($id)
    {
        User::destroy($id);
    }

}