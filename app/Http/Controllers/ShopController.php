<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public function shop()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->get();

        return view('user.shop', compact('categories', 'products'));
    }
}
