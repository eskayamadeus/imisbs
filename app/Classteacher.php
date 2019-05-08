<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classteacher extends Model
{
    protected $fillable=['staff_id', 'classroom_id'];
    protected $hidden=[];
    // has Staff
    // has Classroom

    // a  classteacher belongs to a classroom
    public function classroom(){
        return $this->belongsTo('App\Classroom');
    }
}
