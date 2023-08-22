<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AmenitiesController extends Controller
{
    public function list() {

        $amenities = Amenity::all();

        if (request()->ajax()) {
            return DataTables::of($amenities)
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('amenities.edit', $data->id) . '" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="' . route('amenities.delete', $data->id) . '" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.pages.amenities.list', Compact('amenities'));

    }

    public function create()
    {
        return view('backend.pages.amenities.create');
    }

    public function store(request $request)
    {
        // validator
        $validation = Validator::make($request->all(), [
            'name' => 'required|unique:amenities,name',
        ]);
        if ($validation->fails()) {
            toastr()->error($validation->errors()->first());
            return redirect()->back();
        }
        $input = $request->except("_token");
        $status = Amenity::create($input);
        if ($status) {
            toastr()->success('Amenitie successfully created');
            return redirect()->route('amenities.list');
        }toastr()->error('Something went wrong');
        return redirect()->back();

    }
    public function edit($id)
    {
        $amenity = Amenity::find($id);
        return view('backend.pages.amenities.edit', compact('amenity'));
    }
    public function update(Request $request, $id)
    {
        $amenity = Amenity::find($id);
        $validation = Validator::make($request->all(), [
            'name' => 'required|unique:amenities,name,' . $amenity->id,
        ]);
        if ($validation->fails()) {
            toastr()->error($validation->errors()->first());
            return redirect()->back();
        }
        $input = $request->except("_token");
        $status = $amenity->fill($input)->save();
        if ($status) {
            toastr()->success('Amenitie successfully updated');
            return redirect()->route('amenities.list');
        }toastr()->error('Something went wrong');
        return redirect()->back();
    }

    public function delete($id)
    {
        $amenity = Amenity::find($id);
        $status = $amenity->delete();
        if ($status) {
            toastr()->success('Amenitie successfully deleted');
            return redirect()->route('amenities.list');
        }toastr()->error('Something went wrong');
        return redirect()->back();
    }
    public function amenities_report()
    {

        return view('backend.pages.Report.amenities');

    }

    public function amenities_report_search(Request $request)
    {

        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date|after:from_date',

        ]);

        $from = $request->from_date;
        $to = $request->to_date;

        $amenities = Amenity::whereBetween('çreated_at', [$from, $to])->get();
        return view('backend.pages.Report.amenities', compact('amenities'));

    }

}
