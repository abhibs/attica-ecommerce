<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    public function create()
    {
        return view('admin.state.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ], [
            'name.required' => 'State Name is Required',
        ]);

        State::insert([
            'name' => $request->name,
        ]);

        $notification = [
            'message' => 'State Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('state-index')->with($notification);
    }

    public function index()
    {
        $datas = State::latest()->get();

        return view('admin.state.index', compact('datas'));
    }

    public function edit($id)
    {
        $data = State::findOrFail($id);
        return view('admin.state.edit', compact('data'));
    }

    public function update(Request $request)
    {

        $id = $request->id;

        State::findOrFail($id)->update([
            'name' => $request->name,

        ]);


        $notification = array(
            'message' => 'State Updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('state-index')->with($notification);


    }

    public function delete($id)
    {

        State::findOrFail($id)->delete();

        $notification = array(
            'message' => 'State Deleted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }
}
