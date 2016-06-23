<?php

namespace App\Handlers\Commands;


use App\Commands\UpdateUserCommand;
use App\Repositories\UsersRepositoryInterface;

class UpdateUserCommandHandler
{
    public function __construct(UsersRepositoryInterface $users)
    {
        $this->users = $users;
    }
    
    public function handle(UpdateUserCommand $command)
    {
        $user = $this->users->find($command->getId());
        $user->setName($command->getName());
        $user->setNumber($command->getNumber());
        $user->setEmail($command->getEmail());
        $user->setPassword($command->getPassword());
        
        $this->users->store($user);   
    }
}