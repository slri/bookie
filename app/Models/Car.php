<?php

namespace Bookie\Models;

class Car extends Model {
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     *
     *	protected $hidden = [
     *   	'image',
     *	];
     */
}
