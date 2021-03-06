<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showIndex() {

        $advertised_offers = Product::where('advertised_offer', 1)->get();
        $today_offers      = Product::where('today_offer', 1)->get();
        $brands            = Brand::get();
        $offers            = Product::where('has_offer', 1)->limit(4)->get();

        return view('index', compact('advertised_offers', 'today_offers', 'brands', 'offers'));
    }
}
