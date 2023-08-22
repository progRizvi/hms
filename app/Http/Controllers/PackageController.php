<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PackageController extends Controller
{
    function list() {
        $packages = Package::all();
        if (request()->ajax()) {
            return DataTables::of($packages)
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('package.edit', $data->id) . '" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="' . route('package.delete', $data->id) . '" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.pages.packages.list',compact('packages'));
    }
    public function create()
    {
        return view('backend.pages.packages.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'room_id' => 'required',
            'days' => 'required',
            'nights' => 'required',
            'person' => 'required',
            'image' => 'required',
            'price' => 'required',
        ]);
        $input = $request->except("_token");
        // image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/images/packages'), $image_name);
            $input['image'] = $image_name;
        }
        $package = Package::create($input);
        if ($package) {
            toastr()->success('Package created successfully');
            return redirect()->route('package.list');
        }

        return redirect()->route('package.list');
    }
    public function edit()
    {
        return view('backend.pages.packages.edit');
    }
}