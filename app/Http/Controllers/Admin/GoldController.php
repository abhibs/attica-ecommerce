<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gold;

class GoldController extends Controller
{

    public function create(){
        return view('admin.gold.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rate' => 'required',

        ], [
            'name.required' => 'Gold Weight Name is Required',
            'rate.required' => 'Gold Weight Rate is Required',
        ]);

        Gold::insert([
            'name' => $request->name,
            'rate' => $request->rate,
        ]);

        $notification = [
            'message' => 'Gold Rate Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('gold-index')->with($notification);
    }
    public function index()
    {
        $datas = Gold::latest()->get();


        return view('admin.gold.index', compact('datas'));
    }

    public function edit($id)
    {
        $data = Gold::findOrFail($id);
        return view('admin.gold.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $id = $request->id;

        Gold::findOrFail($id)->update([
            'name' => $request->name,
            'rate' => $request->rate,

        ]);


        $notification = array(
            'message' => 'Gold Rate Updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('gold-index')->with($notification);

    }

    public function delete($id)
    {

        Gold::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Gold Rate Deleted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }
}
