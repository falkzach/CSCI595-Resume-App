<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'user_id', 'employer', 'start_date', 'end_date', 'description'
    ];

    protected $dates = [
        'created_at', 'updated_at', //'start_date', 'end_date'
    ];
}
