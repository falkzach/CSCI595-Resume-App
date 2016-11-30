<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'institution', 'enrolled', 'graduation_date', 'gpa'
    ];

    protected $casts = [
        'enrolled'
    ];
}
