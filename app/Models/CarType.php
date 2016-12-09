<?php

namespace Bookie\Models;

class CarType extends \Eloquent {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'manufacturer',
        'model',
        'description',
        'image',
    ];

    protected $table = "cartypes";

    public function cars() {
        
        return $this->hasMany("\Bookie\Models\Car");
    }
}
