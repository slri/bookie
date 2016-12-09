<?php

namespace Bookie\Models;


class Rental extends \Eloquent {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'car_id',
    ];

    public function car() {
    	return $this->belongsTo("\Bookie\Models\Car");
    }

    public function user() {

        return $this->belongsTo("\Bookie\Models\User");
    }

}
