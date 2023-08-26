<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use App\Models\Room;
use Illuminate\Http\Request;

class UserBookingController extends Controller
{
    public function getPackageInfo(Request $request)
    {
        $package = Package::find($request->id);
        return response()->json($package);
    }
    public function booking($id)
    {
        $room = Room::find($id);
        return view('frontend.pages.bookings.booking', compact('room'));
    }
    public function cancel($id)
    {
        $booking = Booking::find($id);
        $booking->status = "cancel";
        $booking->save();
        toastr()->success('Booking Cancelled Successfully');
        return redirect()->back();
    }
}
