<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function showProduct($id) {

        $product = Product::where('id', $id)->first();
        $offers  = Product::where('has_offer', 1)->limit(4)->get();

        return view('product', compact('product', 'offers'));
    }


    public function search() {

        $search = request()->q;

        $products = Product::where('name', 'LIKE', '%'. $search ."%")
                            ->orWhere('description', "LIKE", '%'. $search ."%")
                            ->orWhere('price', "LIKE", '%'. $search ."%")
                            ->orWhere('offer_price', "LIKE", '%'. $search ."%")
                            ->paginate(9);
                            

        return view('search', compact('products'));
    }


    public function addToCart(Request $request) {

        $product_id = $request->id;
        $user_id    = Auth::user()->id;

        $cart = Cart::where('user_id', $user_id)->where('product_id', $product_id)->count();

        if ($cart > 0 ) {
            $old_quantity = Cart::where('user_id', $user_id)->where('product_id', $product_id)->first()->quantity;

            Cart::where('user_id', $user_id)->where('product_id', $product_id)->update([
                'quantity' => $old_quantity+1
            ]);
        } else {
            $cart = new Cart;
            $cart->user_id = $user_id;
            $cart->product_id = $product_id;
            $cart->save();
        }


        return back();
    }
}
