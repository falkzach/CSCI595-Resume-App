<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function schools()
    {
        return $this->hasMany('App\School');
    }

    public function jobs()
    {
        return $this->hasMany('App\Work');
    }

    public function skills()
    {
        return $this->hasMany('App\Skill');
    }

    public function references()
    {
        return $this->hasMany('App\Reference');
    }

    public function resumes()
    {
        return $this->hasMany('App\Resume');
    }
}
