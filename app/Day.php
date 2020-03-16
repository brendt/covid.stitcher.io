<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $guarded = [];

    protected $casts = [
        'date' => 'datetime',
        'confirmed' => 'integer',
        'deaths' => 'integer',
        'recovered' => 'integer',
    ];
}
