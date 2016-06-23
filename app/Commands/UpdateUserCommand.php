<?php

namespace App\Commands;


class UpdateUserCommand
{
    public function __construct(
        $id,
        $name,
        $number,
        $isadmin,
        $email,
        $password
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->number = $number;
        $this->isadmin = $isadmin;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId() : int
    {
       return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getNumber() : string
    {
        return $this->number;
    }

    public function getEmail() :  string
    {
        return $this->email;
    }

    public function isAdmin() : bool
    {
        return $this->isadmin;
    }

    public function getPassword() : string
    {
        return $this->password;
    }
}