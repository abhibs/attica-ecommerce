<?php

namespace App\Http\Controllers;

use App\Models\Weight;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public function shop()
    {

        $products = Product::query();

        if (!empty($_GET['category'])) {
            $slugs = explode(',', $_GET['category']);
            $catIds = Category::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
            $products = Product::whereIn('category_id', $catIds)->get();
        }

        if (!empty($_GET['weight'])) {
            $grams = explode(',', $_GET['weight']);
            $weightIds = Weight::select('id')->whereIn('gram', $grams)->pluck('id')->toArray();
            $products = Product::whereIn('weight_id', $weightIds)->get();
        } else {
            $products = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        }

        $categories = Category::orderBy('name', 'ASC')->get();
        $weights = Weight::get();


        return view('user.shop', compact('categories', 'products', 'weights'));
    }

    public function shopFilter(Request $request)
    {
        $data = $request->all();

        /// Filter For Category

        $catUrl = "";
        if (!empty($data['category'])) {
            foreach ($data['category'] as $category) {
                if (empty($catUrl)) {
                    $catUrl .= '&category=' . $category;
                } else {
                    $catUrl .= ',' . $category;
                }
            }
        }

        $weightUrl = "";
        if (!empty($data['weight'])) {
            foreach ($data['weight'] as $weight) {
                if (empty($weightUrl)) {
                    $weightUrl .= '&weight=' . $weight;
                } else {
                    $weightUrl .= ',' . $weight;
                }
            }
        }

        return redirect()->route('shop', $catUrl . $weightUrl);

    }
}
