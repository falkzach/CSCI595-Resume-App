<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'user_id', 'name',
    ];

    public function schools()
    {
        return $this->belongsToMany('App\School');
    }

    public function jobs()
    {
        return $this->belongsToMany('App\Work');
    }

    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }

    public function references()
    {
        return $this->belongsToMany('App\Reference');
    }
}
