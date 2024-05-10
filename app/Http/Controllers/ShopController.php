<?php

namespace App\Http\Controllers;

use App\Models\Gold;
use App\Models\Quality;
use App\Models\Weight;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public function shop(Request $request)
    {
        $productsQuery = Product::query()->with('category', 'weight', 'gold', 'quality');

        // Filter products by category
        if ($request->filled('category')) {
            $categorySlugs = explode(',', $request->input('category'));
            $productsQuery->whereHas('category', function ($query) use ($categorySlugs) {
                $query->whereIn('slug', $categorySlugs);
            });
        }

        // Filter products by weight
        if ($request->filled('weight')) {
            $weights = explode(',', $request->input('weight'));
            $productsQuery->whereHas('weight', function ($query) use ($weights) {
                $query->whereIn('gram', $weights);
            });
        }


        if ($request->filled('gold')) {
            $golds = explode(',', $request->input('gold'));
            $productsQuery->whereHas('gold', function ($query) use ($golds) {
                $query->whereIn('name', $golds);
            });
        }


        if ($request->filled('quality')) {
            $qualities = explode(',', $request->input('quality'));
            $productsQuery->whereHas('quality', function ($query) use ($qualities) {
                $query->whereIn('name', $qualities);
            });
        }

        // Apply additional constraints (e.g., status, ordering)
        $productsQuery->where('status', 1)
            ->orderBy('id', 'DESC');

        // Execute the query to fetch products
        $products = $productsQuery->get();

        // Fetch all categories and weights for display purposes
        $categories = Category::orderBy('name', 'ASC')->get();
        $weights = Weight::orderBy('gram', 'ASC')->get();
        $golds = Gold::orderBy('name', 'ASC')->get();
        $qualities = Quality::orderBy('name', 'ASC')->get();



        return view('user.shop', compact('categories', 'products', 'weights', 'golds', 'qualities'));
    }




    public function shopFilter(Request $request)
    {
        $data = $request->all();

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

        $rateUrl = "";
        if (!empty($data['gold'])) {
            foreach ($data['gold'] as $gold) {
                if (empty($rateUrl)) {
                    $rateUrl .= '&gold=' . $gold;
                } else {
                    $rateUrl .= ',' . $gold;
                }
            }
        }




        $qualityUrl = "";
        if (!empty($data['quality'])) {
            foreach ($data['quality'] as $quality) {
                if (empty($qualityUrl)) {
                    $qualityUrl .= '&quality=' . $quality;
                } else {
                    $qualityUrl .= ',' . $quality;
                }
            }
        }

        return redirect()->route('shop', $catUrl . $weightUrl . $rateUrl . $qualityUrl);


    }
}
