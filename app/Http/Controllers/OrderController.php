<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function showCheckout() {

        return view('checkout');
    }


    public function makeOrder () {

        if(Auth::user()->carts()->count() == 0) {
            return redirect('/');
        }

        $order = new Order;
        $order->user_id = Auth::user()->id;

        $total = 0;
        foreach(Auth::user()->carts as $cart) {
            $price = $cart->has_offer == 1? $cart->offer_price : $cart->price;
            $total_price = $cart->pivot->quantity * $price;
            $total += $total_price;
        }

        $total +=15; // Tax

        $order->total_price = $total;
        $order->save();

        foreach (Auth::user()->carts as $cart) {
            $order_product = new OrderProduct;
            $order_product->product_id = $cart->id;
            $order_product->order_id = $order->id;
            $order_product->quantity = $cart->pivot->quantity;
            $order_product->save();
        }


        Auth::user()->carts()->detach();

        return redirect('/')->with('success', 'Order Created Successfully');
    }
}
