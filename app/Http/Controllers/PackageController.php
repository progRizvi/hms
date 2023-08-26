<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PackageController extends Controller
{
    function list() {
        $packages = Package::with("room")->get();
        // dd($packages);
        if (request()->ajax()) {
            return DataTables::of($packages)
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('packages.edit', $data->id) . '" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="' . route('packages.delete', $data->id) . '" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.pages.packages.list', compact('packages'));
    }
    public function create()
    {
        $rooms = Room::all();
        return view('backend.pages.packages.create', compact('rooms'));
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'room_id' => 'required',
            'days' => 'required',
            'nights' => 'required',
            'person' => 'required',
            'image' => 'required',
            'price' => 'required',
        ]);
        if ($validation->fails()) {
            toastr()->error('Fill up the form correctly');
            return redirect()->back();
        }
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
    public function edit($id)
    {
        $rooms = Room::all();
        $package = Package::find($id);
        return view('backend.pages.packages.edit', compact('rooms', 'package'));
    }
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'room_id' => 'required',
            'days' => 'required',
            'nights' => 'required',
            'person' => 'required',
            'price' => 'required',
        ]);
        if ($validation->fails()) {
            toastr()->error('Fill up the form correctly');
            return redirect()->back();
        }
        $input = $request->except("_token");
        // image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/images/packages'), $image_name);
            $input['image'] = $image_name;
        }
        $package = Package::find($id)->update($input);
        if ($package) {
            toastr()->success('Package updated successfully');
            return redirect()->route('package.list');
        }

        return redirect()->route('package.list');
    }
    public function delete($id)
    {
        $package = Package::find($id);
        if ($package) {
            $package->delete();
            toastr()->success('Package deleted successfully');
            return redirect()->route('package.list');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('package.list');
    }
}
