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

    public function edit($id)
    {
        $multiImgs = MultiImg::where('product_id', $id)->get();
        $weights = Weight::latest()->get();
        $categories = Category::latest()->get();
        $qualities = Quality::latest()->get();
        $golds = Gold::latest()->get();
        $data = Product::findOrFail($id);
        return view('admin.product.edit', compact('multiImgs', 'weights', 'qualities', 'categories', 'golds', 'data'));
    }


    public function update(Request $request)
    {
        $id = $request->id;
        $weight = Weight::findOrFail($request->input('weight_id'));
        $gold = Gold::findOrFail($request->input('gold_id'));
        $price = $weight->gram * $gold->rate;
        $gst = $weight->gram * $gold->rate * 3 / 100;
        $total = $price + $gst;


        Product::findOrFail($id)->update([
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
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('product-index')->with($notification);



    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'required',

        ], [
            'image.required' => 'Image is Required',
        ]);

        $pro_id = $request->id;
        $oldImage = $request->old_img;

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1000, 1000)->save('storage/products/image/' . $name_gen);
        $save_url = 'storage/products/image/' . $name_gen;

        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        Product::findOrFail($pro_id)->update([

            'image' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }

    public function updateMultiImage(Request $request)
    {
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(1000, 1000)->save('storage/products/multi-image/' . $make_name);
            $uploadPath = 'storage/products/multi-image/' . $make_name;

            MultiImg::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),

            ]);
        } // end foreach

        $notification = array(
            'message' => 'Product Multi Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function deleteMultiImage($id)
    {
        $oldImg = MultiImg::findOrFail($id);
        unlink($oldImg->photo_name);

        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Multi Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

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
