<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pincode;

class PincodeController extends Controller
{
    public function create()
    {
        return view('admin.pincode.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pincode' => ['required', 'max:6', 'min:6'],
        ]);

        Pincode::insert([
            'pincode' => $request->pincode,
        ]);

        $notification = [
            'message' => 'Pincode Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('pincode-index')->with($notification);
    }


    public function index()
    {

        $datas = Pincode::latest()->get();
        return view('admin.pincode.index', compact('datas'));

    }


    public function edit($id)
    {
        $data = Pincode::findOrFail($id);
        return view('admin.pincode.edit', compact('data'));
    }


    public function update(Request $request)
    {

        $id = $request->id;

        Pincode::findOrFail($id)->update([
            'pincode' => $request->pincode,

        ]);


        $notification = array(
            'message' => 'Pincode Updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('pincode-index')->with($notification);


    }


    public function delete($id)
    {

        Pincode::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Pincode Deleted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }



}
