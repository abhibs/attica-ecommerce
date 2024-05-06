<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Occasion;
use App\Models\Banner;

class HomeController extends Controller
{
    public function index()
    {

        $occation = Occasion::first();
        $featured_products = Product::where('status', 1)->where('featured_product', 1)->inRandomOrder()->get();
        $newarrived_products = Product::where('status', 1)->where('new_arrivals', 1)->inRandomOrder()->get();

        // $allproducts = Product::where('status', 1)->inRandomOrder()->get();

        $coinCategory = Category::where('slug', 'gold-coin')->first();
        $coinCategoryproducts = Product::where('category_id', $coinCategory->id)->where('status', 1)->inRandomOrder()->limit(5)->get();


        $barCategory = Category::where('slug', 'gold-bar')->first();
        $barCategoryproducts = Product::where('category_id', $barCategory->id)->where('status', 1)->inRandomOrder()->limit(5)->get();

        $banners = Banner::where('status', 1)->get();


        return view('user.welcome', compact('newarrived_products', 'featured_products', 'coinCategoryproducts', 'barCategoryproducts', 'occation', 'banners'));
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

    public function orderTracking()
    {
        return view('user.ordertraking');
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


    public function searchByName(Request $request)
    {
        $request->validate(['search' => "required"]);

        $item = $request->search;

        $products = Product::where('name', 'LIKE', "%$item%")->get();
        // dd($products);
        return view('user.search_by_name', compact('products', 'item'));
    }


    public function contactPost(Request $request)
    {
        dd($request->all());
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
