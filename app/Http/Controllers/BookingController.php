<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{
    public function index()
    {
        $bookLists = Booking::with(['room', "room_type", "user", "booking_details"])->get();
        if (request()->ajax()) {
            return DataTables::of($bookLists)
                ->addColumn('action', function ($data) {
                    $button = '<a href="' . route('booking.edit', $data->id) . '" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        };

        return view('backend.pages.bookings.list', compact('bookLists'));
    }
    public function create()
    {
        $rooms = Room::all();
        $amenities = Amenity::all();
        // dd($categories);
        return view('backend.pages.books.create', compact('rooms', 'amenities'));
    }
    public function store(Request $request)
    {
        Booking::create([
            'date' => $request->date,
            'category_id' => $request->category_id,
            'room_id' => $request->room_id,
            'Am_id' => $request->Am_id,
        ]);
        return to_route('room.list');
    }
    public function delete($id)
    {

        Booking::destroy($id);
        return redirect()->back();
    }
}
