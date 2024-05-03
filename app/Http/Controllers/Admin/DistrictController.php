<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\District;

class DistrictController extends Controller
{
    public function create()
    {
        $states = State::latest()->get();
        return view('admin.district.create', compact('states'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'state_id' => 'required',
            'name' => 'required',


        ], [
            'state_id.required' => 'Please Select State',
            'name.required' => 'District Name is Required',

        ]);

        District::insert([
            'state_id' => $request->state_id,
            'name' => $request->name,

        ]);

        $notification = [
            'message' => 'District Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('district-index')->with($notification);
    }

    public function index()
    {
        $datas = District::latest()->get();

        return view('admin.district.index', compact('datas'));
    }

    public function edit($id)
    {

        $states = State::latest()->get();
        $data = District::findOrFail($id);
        return view('admin.district.edit', compact('data', 'states'));
    }

    public function update(Request $request)
    {
        $id = $request->id;

        District::findOrFail($id)->update([
            'state_id' => $request->state_id,
            'name' => $request->name,
        ]);


        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('district-index')->with($notification);


    }

    public function delete($id)
    {

        District::findOrFail($id)->delete();

        $notification = array(
            'message' => 'District Deleted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }
}
