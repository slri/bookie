<?php

namespace Bookie\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
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

    public function cars() {

        return $this->hasMany("\Bookie\Models\Car");
    }

    public function rentals() {
        
        return $this->hasMany("\Bookie\Models\Rental");
    }
}
