<?php

namespace App\Http\Controllers;

use App\Models\Room;

class FrontendRoomController extends Controller
{
    public function availableRooms()
    {
        $rooms = Room::where('status', "active")->where("availability", "available")->orderBy('id', 'desc')->get();
        return view('frontend.pages.rooms.allRooms', compact("rooms"));
    }
}
