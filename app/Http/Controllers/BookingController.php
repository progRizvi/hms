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
                ->rawColumns(['action'])
                ->make(true);
        };

        return view('backend.pages.bookings.list', compact('bookLists'));
    }
    public function create()
    {
        $rooms = Room::all();
        $amenities = Amenity::all();
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
    public function edit($id)
    {
        $book = Booking::find($id);
        $rooms = Room::all();
        $amenities = Amenity::all();
        return view('backend.pages.books.edit', compact('book', 'rooms', 'amenities'));
    }
    public function update(Request $request, $id)
    {
        $book = Booking::find($id);
        $book->update([
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
    public function confirm($id)
    {
        $book = Booking::find($id);
        $book->update([
            'status' => "confirm",
        ]);
        toastr()->success('Booking Confirm Successfully');
        return redirect()->back();
    }
    public function cancel($id)
    {
        $book = Booking::find($id);
        $book->update([
            'status' => "cancel",
        ]);
        toastr()->success('Booking Cancel Successfully');
        return redirect()->back();
    }
}
