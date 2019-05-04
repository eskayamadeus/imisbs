<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    // defining default attributes for the model
    // protected $attributes = [
    //     'name' => 'UPS',
    // ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'location', 'region', 'academic_year'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
