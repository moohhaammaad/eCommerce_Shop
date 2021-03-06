<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name', 'image', 'facebook', 'twitter', 'google', 'description', 'position'
    ];
}
