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
        $newarrived_products = Product::where('status', 1)->where('new_arrivals', 1)->inRandomOrder()->get();

        // $allproducts = Product::where('status', 1)->inRandomOrder()->get();

        $coinCategory = Category::where('slug', 'gold-coin')->first();
        $coinCategoryproducts = Product::where('category_id', $coinCategory->id)->where('status', 1)->inRandomOrder()->limit(5)->get();


        $barCategory = Category::where('slug', 'gold-bar')->first();
        $barCategoryproducts = Product::where('category_id', $barCategory->id)->where('status', 1)->inRandomOrder()->limit(5)->get();

        return view('user.welcome', compact('newarrived_products', 'featured_products', 'coinCategoryproducts', 'barCategoryproducts'));
    }

    public function contact()
    {
        return view('user.contact');
    }


    public function terms()
    {
        return view('user.terms');
    }

    public function privacy()
    {
        return view('user.privacy');
    }

    public function faq()
    {
        return view('user.faq');
    }

    public function about()
    {
        return view('user.about');
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

    public function catWiseProduct($id, $slug)
    {
        $category = Category::where('id', $id)->first();
        $relatedProduct = Product::where('category_id', $category->id)->orderBy('id', 'DESC')->inRandomOrder()->get();

        return view('user.cat_products', compact('relatedProduct', 'category'));
    }











    // ajax

    public function productViewModel($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return response()->json(
            array(
                'product' => $product
            )
        );
    }

}
