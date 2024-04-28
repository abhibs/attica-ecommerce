<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;




class HomeController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('status', 1)->where('featured_product', 1)->inRandomOrder()->get();
        $allproducts = Product::where('status', 1)->inRandomOrder()->get();

        $coinCategory = Category::where('slug', 'gold-coin')->first();
        $coinCategoryproducts = Product::where('category_id', $coinCategory->id)->where('status', 1)->inRandomOrder()->limit(5)->get();


        $barCategory = Category::where('slug', 'gold-bar')->first();
        $barCategoryproducts = Product::where('category_id', $barCategory->id)->where('status', 1)->inRandomOrder()->limit(5)->get();

        return view('user.welcome', compact('allproducts', 'featured_products', 'coinCategoryproducts', 'barCategoryproducts'));
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function cart()
    {
        return view('user.cart');
    }

    public function wishlist()
    {
        return view('user.wishlist');
    }

    public function checkout()
    {
        return view('user.checkout');
    }

    public function productDetais($id, $slug)
    {
        $product = Product::findOrFail($id);
        $multiImage = MultiImg::where('product_id', $id)->get();
        // dd($multiImage);

        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id', $cat_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->limit(4)->get();

        return view('user.product_detail', compact('product', 'multiImage', 'relatedProduct'));
    }

}
