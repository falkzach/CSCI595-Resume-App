<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'user_id', 'name',
    ];

    //TODO: many to many relationships
}
