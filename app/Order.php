<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'total_price', 'user_id', 'deliver_date'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }


    public function products() {
        return $this->belongsToMany('App\Product', 'order_products', 'order_id', 'product_id');
    }
}
