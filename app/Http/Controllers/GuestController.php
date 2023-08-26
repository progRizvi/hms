<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class GuestController extends Controller
{
    function list() {
        $guest = Guest::all();

        if (request()->ajax()) {
            return DataTables::of($guest)
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('guest.edit', $data->id) . '" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="' . route('guest.delete', $data->id) . '" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.pages.guest.list', Compact('guest'));
    }

    public function create()
    {
        return view('backend.pages.guest.create');
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required",
            "address" => "required",
        ]);
        if ($validation->fails()) {
            foreach ($validation->errors()->all() as $error) {
                toastr()->error($error);
            }
            return redirect()->back();
        }
        Guest::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address,
            'description' => $request->description,
        ]);
        return to_route('guest.list');

    }

    public function edit($id)
    {
        $guest = Guest::find($id);
        return view('backend.pages.guest.edit', compact('guest'));
    }
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required",
            "address" => "required",
        ]);

        if ($validation->fails()) {
            foreach ($validation->errors()->all() as $error) {
                toastr()->error($error);
            }
            return redirect()->back();
        }
        $guest = Guest::find($id);
        $guest->name = $request->name;
        $guest->email = $request->email;
        $guest->age = $request->age;
        $guest->address = $request->address;
        $guest->gender = $request->gender;
        $guest->description = $request->description;
        $guest->save();
        toastr()->success('Guest Updated Successfully');
        return to_route('guest.list');
    }
    public function delete($id)
    {
        $guest = Guest::find($id);
        $guest->delete();
        toastr()->success('Guest Deleted Successfully');
        return to_route('guest.list');
    }

}
