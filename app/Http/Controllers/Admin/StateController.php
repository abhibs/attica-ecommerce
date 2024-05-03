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
        return view('admin.state.index');
    }
}
