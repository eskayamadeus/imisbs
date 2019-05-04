<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable=['name'];
    protected $hidden=[];

    // setting up the relationship. A class has many pupils
    // public function pupils(){
    //     return $this->hasMany('App\Pupil');
    // }
}
