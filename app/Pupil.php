<?php

namespace App;

use App\Notifications\PupilResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pupil extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'class'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // a pupil belongs to a class(room)
    public function classroom(){
        return $this->belongsTo('App\Classroom');
    }

    // a pupil belongs to one parent
    //public function pupilparent(){
        //return $this->belongsTo(Pupilparent::class);
       // return $this->belongsTo('App\Pupilparent');
    //}

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PupilResetPassword($token));
    }
}
