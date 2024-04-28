<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ], [
            'name.required' => 'Category Name is Required',
            'image.required' => 'Category Image is Required',

        ]);
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1100, 1100)->save('storage/category/' . $name_gen);
        $save_url = 'storage/category/' . $name_gen;

        Category::insert([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'image' => $save_url,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('category-index')->with($notification);


    }

    public function index()
    {
        $datas = Category::latest()->get();
        return view('admin.category.index', compact('datas'));

    }

    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view('admin.category.edit', compact('data'));
    }



    public function update(Request $request)
    {

        $id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image')) {
            unlink($old_img);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1100, 1100)->save('storage/category/' . $name_gen);
            $save_url = 'storage/category/' . $name_gen;

            Category::findOrFail($id)->update([
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Category Updated with Image Successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('category-index')->with($notification);


        } else {

            Category::findOrFail($id)->update([
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Category Updated without Image Successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('category-index')->with($notification);

        }

    }

    public function delete($id)
    {
        $data = Category::findOrFail($id);
        $img = $data->image;
        unlink($img);

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);

    }

}
