<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Weight;
use App\Models\Category;
use App\Models\Quaility;


class WeightController extends Controller
{
    public function create()
    {
        return view('admin.weight.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gram' => 'required',
        ], [
            'gram.required' => 'Gram is Required',
        ]);

        Weight::insert([
            'gram' => $request->gram,
        ]);

        $notification = [
            'message' => 'Weight Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('weight-index')->with($notification);
    }


    public function index()
    {

        $datas = Weight::latest()->get();
        return view('admin.weight.index', compact('datas'));

    }


    public function edit($id)
    {
        $data = Weight::findOrFail($id);
        return view('admin.weight.edit', compact('data'));
    }


    public function update(Request $request)
    {

        $id = $request->id;

        Weight::findOrFail($id)->update([
            'gram' => $request->gram,

        ]);


        $notification = array(
            'message' => 'Weight Updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('weight-index')->with($notification);


    }


    public function delete($id)
    {

        Weight::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Weight Deleted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }
}
