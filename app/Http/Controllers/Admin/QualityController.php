<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quality;

class QualityController extends Controller
{
    public function create()
    {
        return view('admin.quality.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Quality Name is Required',
        ]);

        Quality::insert([
            'name' => $request->name,
        ]);

        $notification = [
            'message' => 'Quality Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('quality-index')->with($notification);
    }


    public function index()
    {

        $datas = Quality::latest()->get();
        return view('admin.quality.index', compact('datas'));

    }


    public function edit($id)
    {
        $data = Quality::findOrFail($id);
        return view('admin.quality.edit', compact('data'));
    }


    public function update(Request $request)
    {

        $id = $request->id;

        Quality::findOrFail($id)->update([
            'name' => $request->name,

        ]);


        $notification = array(
            'message' => 'Quality Updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('quality-index')->with($notification);


    }


    public function delete($id)
    {

        Quality::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Quality Deleted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }
}
