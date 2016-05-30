<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setName(string $name)
    {
        $this->setAttribute('name', $name);
    }

    public function setNumber(string $number)
    {
        $this->setAttribute('number', $number);
    }

    public function setEmail(string $email)
    {
        $this->setAttribute('email', $email);
    }

    public function setAdmin(bool $isAdmin)
    {
        $this->setAttribute('isadmin', $isAdmin);
    }

    public function setPassword(string $password)
    {
        $this->setAttribute('password', $password);
    }

    public function getName() : string
    {
        $this->getAttribute('name');
    }

    public function getNumber() : string
    {
        $this->getAttribute('number');
    }

    public function getEmail() :  string
    {
        $this->getAttribute('email');
    }

    public function isAdmin() : bool
    {
        $this->getAttribute('isadmin');
    }

    public function getPassword() : string
    {
        $this->getAttribute('password');
    }

    public function advertisements() : HasMany
    {
        return $this->hasMany(Advertisement::class);
    }
}
