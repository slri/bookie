<?php

namespace Bookie\Models;

class Car extends \Eloquent {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'manufacturer',
        'model',
        'description',
        'image',
    ];

    protected $table = "cars";

    public function owner() {

        return $this->belongsToMany("\Bookie\Models\User", "owned_by");
    }

    public function renter() {
        
        return $this->belongsToMany("\Bookie\Models\User", "rented_by");
    }
}
