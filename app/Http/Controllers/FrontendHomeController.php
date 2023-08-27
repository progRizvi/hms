<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Room;

class FrontendHomeController extends Controller
{
    public function home()
    {
        $packages = Package::where('status', "active")->where("availability", null)->orderBy('id', 'desc')->get();
        $rooms = Room::where('status', "active")->where("availability", "available")->orderBy('id', 'desc')->take(3)->get();
        return view('frontend.pages.home', compact('packages', "rooms"));
    }
    public function roomDetails($id)
    {
        $room = Room::find($id);
        return view('frontend.pages.rooms.roomDetails', compact('room'));
    }
}
