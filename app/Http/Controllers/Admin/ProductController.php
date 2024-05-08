<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Weight;
use App\Models\Category;
use App\Models\Quality;
use App\Models\Gold;
use Intervention\Image\Facades\Image;
use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function create()
    {
        $weights = Weight::latest()->get();
        $categories = Category::latest()->get();
        $qualities = Quality::latest()->get();
        $golds = Gold::latest()->get();
        return view('admin.product.create', compact('weights', 'categories', 'qualities', 'golds'));
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1000, 1000)->save('storage/products/image/' . $name_gen);
        $save_url = 'storage/products/image/' . $name_gen;


        $weight = Weight::findOrFail($request->input('weight_id'));
        $gold = Gold::findOrFail($request->input('gold_id'));
        $price = $weight->gram * $gold->rate;
        $gst = $weight->gram * $gold->rate * 3 / 100;
        $total = $price + $gst;

        $product_id = Product::insertGetId([
            'weight_id' => $request->weight_id,
            'category_id' => $request->category_id,
            'quality_id' => $request->quality_id,
            'gold_id' => $request->gold_id,
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'price' => $price,
            'gst' => $gst,
            'total' => $total,
            'content' => $request->content,
            'description' => $request->description,
            'featured_product' => $request->featured_product,
            'new_arrivals' => $request->new_arrivals,
            'rating' => $request->rating,
            'stock' => $request->stock,
            'image' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);


        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(1000, 1000)->save('storage/products/multi-image/' . $make_name);
            $uploadPath = 'storage/products/multi-image/' . $make_name;


            MultiImg::insert([

                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),

            ]);
        } // end foreach


        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product-index')->with($notification);
    }

    public function index()
    {
        $datas = Product::latest()->get();
        return view('admin.product.index', compact('datas'));
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->image);
        Product::findOrFail($id)->delete();

        $imges = MultiImg::where('product_id', $id)->get();
        foreach ($imges as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function inactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Product InActive Successfully',
            'alert-type' => 'error'

        );
        return redirect()->back()->with($notification);

    }

    public function active($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Product Active Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);

    }

}
