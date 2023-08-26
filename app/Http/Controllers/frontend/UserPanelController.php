<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

class UserPanelController extends Controller
{
    public function index()
    {
        return view('frontend.pages.user_panel.layout');
    }

    public function allBooking()
    {
        $bookings = auth("customers")->user()->bookings()->with(['room', "booking_details"])->get();

        return view('frontend.pages.user_panel.bookings', compact("bookings"));
    }
}
