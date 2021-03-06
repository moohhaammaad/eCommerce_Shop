<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'category_id', 'has_offer', 'price', 'offer_price', 'image'
    ];


    public function users() {
        return $this->belongsToMany('App\User', 'carts', 'product_id', 'user_id');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function orders() {
        return $this->belongsToMany('App\Order', 'order_products', 'product_id', 'order_id');
    }
}
