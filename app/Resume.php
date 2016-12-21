<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'user_id', 'name', 'description'
    ];

    public function schools()
    {
        return $this->belongsToMany('App\School')->withTimestamps();
    }

    public function jobs()
    {
        return $this->belongsToMany('App\Work')->withTimestamps();
    }

    public function skills()
    {
        return $this->belongsToMany('App\Skill')->withTimestamps();
    }

    public function references()
    {
        return $this->belongsToMany('App\Reference')->withTimestamps();
    }
}
