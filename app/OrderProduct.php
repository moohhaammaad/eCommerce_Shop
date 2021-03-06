<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'total_price', 'user_id', 'deliver_date', 'quantity'
    ];
}
