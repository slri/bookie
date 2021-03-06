<?php

namespace Bookie\Models;


class Car extends \Eloquent {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'cartype_id',
    ];

    public function type() {
    	return $this->belongsTo("\Bookie\Models\CarType", "cartype_id");
    }

    public function user() {

        return $this->belongsTo("\Bookie\Models\User");
    }
}
