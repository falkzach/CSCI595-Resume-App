<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $fillable = [
        'user_id', 'name', 'email', 'phone'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
