<?php

namespace App\Http\Controllers\Dashboard;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;

class HomeController extends Controller
{
    public function showHome() {

        $users  = User::count();
        $orders = Order::count();
        $products = Product::count();
        $brands = Brand::count();
        $money = Order::sum('total_price');

        return view('dashboard.index', compact('users', 'orders', 'products', 'brands', 'money'));
    }
}
