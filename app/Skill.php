<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'user_id', 'name'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
