<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    public function create()
    {
        return view('admin.branch.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ], [
            'name.required' => 'State Name is Required',
        ]);

        Branch::insert([
            'name' => $request->name,
        ]);

        $notification = [
            'message' => 'Branch Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('branch-index')->with($notification);
    }

    public function index()
    {
        $datas = Branch::latest()->get();

        return view('admin.branch.index', compact('datas'));
    }

    public function edit($id)
    {
        $data = Branch::findOrFail($id);
        return view('admin.branch.edit', compact('data'));
    }

    public function update(Request $request)
    {

        $id = $request->id;

        Branch::findOrFail($id)->update([
            'name' => $request->name,

        ]);


        $notification = array(
            'message' => 'Branch Updated Successfully',
            'alert-type' => 'success'

        );

        return redirect()->route('branch-index')->with($notification);


    }

    public function delete($id)
    {

        Branch::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Branch Deleted Successfully',
            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }
}
