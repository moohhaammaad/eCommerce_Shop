<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategory($id) {
        $category = Category::where('id', $id)->first();

        $products = $category->products()->paginate(9);
        $categories = Category::get();

        return view('category', compact('category', 'products', 'categories'));
    }
}
