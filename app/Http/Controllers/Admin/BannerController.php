<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Banner;
use Carbon\Carbon;

class BannerController extends Controller
{
    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'image' => 'required',
        ], [
            'image.required' => 'Banner Image is Required',

        ]);
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(2376, 807)->save('storage/banner/' . $name_gen);
        $save_url = 'storage/banner/' . $name_gen;

        Banner::insert([
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Banner Inserted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->route('banner-index')->with($notification);


    }

    public function index()
    {
        $datas = Banner::latest()->get();
        return view('admin.banner.index', compact('datas'));

    }

    public function edit($id)
    {
        $data = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('data'));
    }



    public function update(Request $request)
    {

        $id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image')) {
            unlink($old_img);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(2376, 807)->save('storage/banner/' . $name_gen);
            $save_url = 'storage/banner/' . $name_gen;

            Banner::findOrFail($id)->update([
                'image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Banner Updated Successfully',
                'alert-type' => 'success'

            );
            return redirect()->route('banner-index')->with($notification);


        }

    }


    public function inactive($id)
    {
        Banner::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Banner InActive Successfully',
            'alert-type' => 'error'

        );
        return redirect()->back()->with($notification);

    }

    public function active($id)
    {
        Banner::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Banner Active Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);

    }

    public function delete($id)
    {
        $data = Banner::findOrFail($id);
        $img = $data->image;
        unlink($img);

        Banner::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Banner Deleted Successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);

    }
}
