<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class RoomController extends Controller
{
    function list() {
        $rooms = Room::with("amenities", "roomType")->get();
        if (request()->ajax()) {
            return Datatables::of($rooms)
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('room.edit', $data->id) . '" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="' . route('room.delete', $data->id) . '" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.pages.room.list', Compact('rooms'));

    }

    public function create()
    {
        $amenites = Amenity::all();
        $room_types = RoomType::all();
        return view('backend.pages.room.create', compact('amenites', 'room_types'));
    }

    public function store(request $request)
    {
        $rules = [
            'floor_number' => 'required|integer',
            'room_number' => 'required|integer',
            'name' => 'required|string',
            'status' => 'required|in:active,inactive',
            'room_type_id' => 'required|integer',
            "available_beds" => 'required|integer',
            "availability" => 'required',
            'amount' => 'required|numeric',
            'amenity_id' => 'required|array',
            'amenity_id.*' => 'integer',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            toastr()->error('Fill up the form correctly');
            return redirect()->back();
        }
        $inputs = $request->except("_token");
        $images = [];
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('rooms/images'), $imageName);
                $images[] = $imageName;
            }
            $images = $images;
        }
        $data = [
            'floor_number' => $request->input('floor_number'),
            'room_number' => $request->input('room_number'),
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'room_type_id' => $request->input('room_type_id'),
            'beds' => $request->input('beds'),
            'images' => $images,
            'single_bed' => $request->input('single_bed'),
            'double_bed' => $request->input('double_bed'),
            'person' => $request->input('person'),
            'available_beds' => $request->input('available_beds'),
            'availability' => $request->input('availability'),
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
        ];

        $room = Room::create($data);
        $amenityIds = $request->amenity_id;
        $room->amenities()->attach($amenityIds);
        toastr()->success('Room Created Successfully');
        return to_route('room.list');
    }
    public function edit($id)
    {
        $room = Room::find($id);
        $room_types = RoomType::all();
        $amenites = Amenity::all();
        return view('backend.pages.room.edit', compact('room', 'amenites', "room_types"));
    }
    // update
    public function update(Request $request, $id)
    {
        $rules = [
            'floor_number' => 'required|integer',
            'room_number' => 'required|integer',
            'name' => 'required|string',
            'status' => 'required|in:active,inactive',
            'room_type_id' => 'required|integer',
            "available_beds" => 'required|integer',
            "availability" => 'required',
            'amount' => 'required|numeric',
            'amenity_id' => 'required|array',
            'amenity_id.*' => 'integer',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            toastr()->error('Fill up the form correctly');
            return redirect()->back();
        }
        $room = Room::find($id);
        $images = $room->images;
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('rooms/images'), $imageName);
                $images[] = $imageName;
            }
            $images = $images;
        }

        $room->floor_number = $request->floor_number;
        $room->room_number = $request->room_number;
        $room->name = $request->name;
        $room->status = $request->status;
        $room->room_type_id = $request->room_type_id;
        $room->beds = $request->beds;
        $room->single_bed = $request->single_bed;
        $room->double_bed = $request->double_bed;
        $room->available_beds = $request->available_beds;
        $room->availability = $request->availability;
        $room->amount = $request->amount;
        $room->description = $request->description;
        $room->images = $images;
        $room->save();
        $amenityIds = $request->amenity_id;
        $room->amenities()->sync($amenityIds);
        toastr()->success('Room Updated Successfully');
        return to_route('room.list');
    }

    public function delete($id)
    {
        $room = Room::find($id);
        $room->delete();
        toastr()->success('Room Deleted Successfully');
        return redirect()->back();
    }

    public function room_list_report()
    {

        return view('backend.pages.Report.roomlist');

    }

    public function room_list_report_search(Request $request)
    {

        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date|after:from_date',

        ]);

        $from = $request->from_date;
        $to = $request->to_date;

        $room = Room::whereBetween('çreated_at', [$from, $to])->get();
        return view('backend.pages.Report.roomlist', compact('room_list'));

    }

}
