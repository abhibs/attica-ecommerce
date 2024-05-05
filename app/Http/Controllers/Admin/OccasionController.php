<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Occasion;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class OccasionController extends Controller
{
    public function index()
    {
        $data = Occasion::first();
        // dd($data);
        return view('admin.occasion.index', compact('data'));
    }

    // public function update(Request $request)
    // {

    //     $id = $request->id;
    //     // $old_img = $request->old_image;
    //     if ($request->hasFile('image1')) {
    //         // unlink($old_img);
    //         $image = $request->file('image1');
    //         $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    //         Image::make($image)->resize(1200, 900)->save('storage/occasion/' . $name_gen);
    //         $save_url1 = 'storage/occasion/' . $name_gen;

    //         Occasion::findOrFail($id)->update([
    //             'name' => $request->name,
    //             'content' => $request->content,
    //             'image1' => $save_url1,
    //             'updated_at' => Carbon::now(),
    //         ]);

    //         $notification = array(
    //             'message' => 'Occation Updated Successfully',
    //             'alert-type' => 'success'

    //         );
    //         return redirect()->back()->with($notification);

    //     }
    //     if ($request->hasFile('image2')) {
    //         // unlink($old_img);
    //         $image = $request->file('image2');
    //         $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    //         Image::make($image)->resize(1500, 563)->save('storage/occasion/' . $name_gen);
    //         $save_url2 = 'storage/occasion/' . $name_gen;

    //         Occasion::findOrFail($id)->update([
    //             'name' => $request->name,
    //             'content' => $request->content,
    //             'image2' => $save_url2,
    //             'updated_at' => Carbon::now(),
    //         ]);

    //         $notification = array(
    //             'message' => 'Occation Updated Successfully',
    //             'alert-type' => 'success'

    //         );
    //         return redirect()->back()->with($notification);

    //     }
    //     if ($request->hasFile('image3')) {
    //         $image = $request->file('image3');
    //         $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    //         Image::make($image)->resize(1600, 1200)->save('storage/occasion/' . $name_gen);
    //         $save_url3 = 'storage/occasion/' . $name_gen;

    //         Occasion::findOrFail($id)->update([
    //             'name' => $request->name,
    //             'content' => $request->content,
    //             'image3' => $save_url3,
    //             'updated_at' => Carbon::now(),
    //         ]);

    //         $notification = array(
    //             'message' => 'Occation Updated Successfully',
    //             'alert-type' => 'success'

    //         );
    //         return redirect()->back()->with($notification);

    //     }

    //     if ($request->hasFile('image4')) {
    //         $image = $request->file('image4');
    //         $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    //         Image::make($image)->resize(1600, 1200)->save('storage/occasion/' . $name_gen);
    //         $save_url4 = 'storage/occasion/' . $name_gen;

    //         Occasion::findOrFail($id)->update([
    //             'name' => $request->name,
    //             'content' => $request->content,
    //             'image4' => $save_url4,
    //             'updated_at' => Carbon::now(),
    //         ]);

    //         $notification = array(
    //             'message' => 'Occation Updated Successfully',
    //             'alert-type' => 'success'

    //         );
    //         return redirect()->back()->with($notification);
    //     }

    // }

    public function update(Request $request)
    {
        $id = $request->id;
        $occasion = Occasion::findOrFail($id);

        // Define an array to hold image URLs
        $imageUrls = [];

        // Process image1
        if ($request->hasFile('image1')) {
            $image = $request->file('image1');
            $imageUrls['image1'] = $this->uploadAndResizeImage($image, 1200, 920);
        }

        // Process image2
        if ($request->hasFile('image2')) {
            $image = $request->file('image2');
            $imageUrls['image2'] = $this->uploadAndResizeImage($image, 1500, 563);
        }

        // Process image3
        if ($request->hasFile('image3')) {
            $image = $request->file('image3');
            $imageUrls['image3'] = $this->uploadAndResizeImage($image, 1600, 1200);
        }

        // Process image4
        if ($request->hasFile('image4')) {
            $image = $request->file('image4');
            $imageUrls['image4'] = $this->uploadAndResizeImage($image, 1600, 1200);
        }

        // Update Occasion model with new data and image URLs
        $occasion->update([
            'name' => $request->name,
            'content' => $request->content,
            'updated_at' => now(), // Use Carbon for current time if needed
        ]);

        // Update image URLs in the model
        foreach ($imageUrls as $field => $url) {
            if ($url) {
                $occasion->$field = $url;
            }
        }

        // Save the updated model
        $occasion->save();

        $notification = [
            'message' => 'Occation Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Helper method to upload and resize image
    private function uploadAndResizeImage($image, $width, $height)
    {
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize($width, $height)->save('storage/occasion/' . $name_gen);
        return 'storage/occasion/' . $name_gen;
    }

    private function deleteImage($imageUrl)
    {
        // Extract the filename from the URL
        $filename = public_path('storage/occation/' . $imageUrl); // Get the full path

        // Check if the file exists and delete it
        if (file_exists($filename)) {
            unlink($filename); // Delete the file
        }
    }


}

