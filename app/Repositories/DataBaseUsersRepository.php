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
    
    public function find($id)
    {
        $user = User::find($id);
        
        return $user;
    }
    
    public function store($user)
    {
        $user->save();
    }

    public function delete($id)
    {
        User::destroy($id);
    }

}