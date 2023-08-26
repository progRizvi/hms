<?php

namespace App\Http\Controllers;

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
}
