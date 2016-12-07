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

    public function owns() {

        return $this->belongsToMany("\Bookie\Models\Car", "owned_by");
    }

    public function rents() {
        
        return $this->belongsToMany("\Bookie\Models\Car", "rented_by");
    }
}
