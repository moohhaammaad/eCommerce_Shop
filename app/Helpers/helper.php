<?php

use App\Category;

function categories() {
    $categories = Category::limit(5)->get();
    return $categories;
}