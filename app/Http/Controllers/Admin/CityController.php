<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\District;
use App\Models\City;

class CityController extends Controller
{
    public function create()
    {
        $states = State::latest()->get();
        $districts = District::latest()->get();

        return view('admin.city.create', compact('states', 'districts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'state_id' => 'required',
            'district_id' => 'required',
            'name' => 'required',


        ], [
            'state_id.required' => 'Please Select State',
            'district_id.required' => 'Please Select District',
            'name.required' => 'City Name is Required',

        ]);

        City::insert([
            'state_id' => $request->state_id,
            'district_id' => $request->district_id,
            'name' => $request->name,

        ]);

        $notification = [
            'message' => 'City Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('city-index')->with($notification);
    }

    public function index()
    {
        $datas = City::latest()->get();

        return view('admin.city.index', compact('datas'));
    }

    public function edit($id)
    {

        $states = State::latest()->get();
        $districts = State::latest()->get();
        $data = City::findOrFail($id);
        return view('admin.city.edit', compact('data', 'states', 'districts'));
    }

    public function update(Request $request)
    {
        $id = $request->id;

        City::findOrFail($id)->update([
            'state_id' => $request->state_id,
            'district_id' => $request->district_id,
            'name' => $request->name,
        ]);


        $notification = array(
            'message' => 'City Updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('city-index')->with($notification);


    }

    public function delete($id)
    {

        City::findOrFail($id)->delete();

        $notification = array(
            'message' => 'City Deleted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }
}
